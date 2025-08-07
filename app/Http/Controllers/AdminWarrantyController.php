<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warranty;
use App\Models\Product;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Log; 

class AdminWarrantyController extends Controller
{
    public function adminWarranties()
    {
        // Fetch all warranties and eager load the service relationship
        $warranties = Warranty::with('service')->get();
        $section = 'warranties';

        return view('admin.dashboard', compact('section', 'warranties'));
    }

    public function adminSingleWarranty($id)
    {
        // Fetch a single warranty with the service relationship
        $warranty = Warranty::with('service')->findOrFail($id);
        $section = 'single_warranty';

        return view('admin.dashboard', compact('section', 'warranty'));
    }
    public function deleteWarranty($id)
    {
        Log::info("➡ Deleting warranty with ID: $id");
    
        $warranty = Warranty::findOrFail($id);
    
        // ✅ Delete linked product by product_code
        \Log::info("🔍 Looking for product with code: " . $warranty->product_code);
        $deleted = Product::where('code', $warranty->product_code)->delete();
        \Log::info($deleted ? "✅ Product deleted." : "⚠️ No product found to delete.");
    
        // ✅ Delete associated images
        if (!empty($warranty->images_array)) {
            \Log::info("📸 Warranty has image paths: " . $warranty->images_array);
    
            $images = json_decode($warranty->images_array, true);
    
            if (is_array($images)) {
                foreach ($images as $relativePath) {
                    $cleanPath = str_replace(['\\/', '\\'], '/', $relativePath);
                    $filePath = public_path($cleanPath);
    
                    \Log::info("🔍 Checking file: $filePath");
    
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                        Log::info("🗑️ Deleted: $filePath");
                    } else {
                        Log::warning("❌ File does not exist: $filePath");
                    }
                }
            } else {
                Log::warning("⚠️ Image array decoding failed or is not an array.");
            }
        } else {
            Log::info("ℹ️ No images associated with this warranty.");
        }
    
        // ✅ Delete the warranty record
        $warranty->delete();
        Log::info("✅ Warranty record deleted.");
    
        return redirect()->route('admin.warranties')->with('success', 'Warranty, associated product, and images deleted.');
    }
    
}
