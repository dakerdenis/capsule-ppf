<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warranty;

class UserVerificationController extends Controller
{
    public function checkuser(Request $request)
    {
        $request->validate([
            'license_plate_number' => 'required|string'
        ]);
    
        $warranty = Warranty::where('license_plate_number', $request->license_plate_number)->first();
    
        if ($warranty) {
            return response()->json([
                'exists' => true,
                'message' => 'Warranty found!',
                'warranty_link' => route('service.warranty', ['id' => $warranty->id])
            ]);
        }
    
        return response()->json([
            'exists' => false,
            'message' => 'No warranty found for this license plate number.'
        ]);
    }
    
    
}
