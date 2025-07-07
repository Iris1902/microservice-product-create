<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_url' => 'nullable|url',
        ]);

        $product = Product::create($validated);

        return response()->json(['message' => 'Product created', 'data' => $product], 201);
    }

    // Health check endpoint
    public function healthCheck()
    {
        return response()->json(['status' => 'ok', 'message' => 'Service is running']);
    }
}