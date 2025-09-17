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

    $input = trim($request->input('product_code'));

    // 1) сначала пробуем как обычный код (как было)
    $product = Product::where('code', $input)->first();
    $usedConfirmationFlow = false;

    // 2) если не нашли — пробуем как confirmation code (строго 12 A–Z0–9)
    if (!$product && preg_match('/^[A-Z0-9]{12}$/', strtoupper($input))) {
        $product = Product::where('product_confirmation_code', strtoupper($input))->first();
        $usedConfirmationFlow = (bool)$product;
    }

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Product not found.',
        ]);
    }

    if ($usedConfirmationFlow) {
        // 🔸 НОВОЕ ПРАВИЛО: только сроком окна
        if (empty($product->confirmation_check_expires_at) || now()->greaterThan($product->confirmation_check_expires_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Confirmation code verification window has expired.',
            ]);
        }
        // статус не проверяем вовсе
    } else {
        // Старый путь по обычному коду — как и раньше
        if ($product->status == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Product not registered in our system.',
            ]);
        }
        if ($product->status == 2) {
            return response()->json([
                'success' => false,
                'message' => 'This product is expired.',
            ]);
        }
    }

    // успех
    $product->increment('verification_counter');

    $productTypes = [
        1 => 'Urban', 2 => 'Optima', 3 => 'Element',
        4 => 'Huracan', 5 => 'Matte', 6 => 'Black',
    ];
    $product->model_name = $productTypes[$product->type] ?? 'Unknown';

    return response()->json([
        'success' => true,
        'message' => $usedConfirmationFlow
            ? 'Product verified by confirmation code.'
            : 'Product found and verified.',
        'product' => $product,
    ]);
}

}
