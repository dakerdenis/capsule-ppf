<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductVerificationController extends Controller
{
    public function verifyProduct(Request $request)
    {
        $request->validate([
            'product_code' => 'required|string',
        ]);
    
        $product = Product::where('code', $request->input('product_code'))->first();
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.',
            ]);
        }
    
        // Статус 0 — как будто не найден (не прошёл регистрацию)
        if ($product->status == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Product not registered in our system.',
            ]);
        }
    
        // Статус 2 — просрочен
        if ($product->status == 2) {
            return response()->json([
                'success' => false,
                'message' => 'This product is expired.',
            ]);
        }
    
        // Статус 1 — нормальный, можно проверять
        $product->increment('verification_counter');
    
        $productTypes = [
            1 => 'Urban',
            2 => 'Optima',
            3 => 'Element',
            4 => 'Huracan',
            5 => 'Matte',
            6 => 'Black',
        ];
    
        $product->model_name = $productTypes[$product->type] ?? 'Unknown';
    
        return response()->json([
            'success' => true,
            'message' => 'Product found and verified.',
            'product' => $product,
        ]);
    }
    
    
}
