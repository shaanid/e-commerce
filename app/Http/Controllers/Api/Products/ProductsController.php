<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'description', 'price', 'stock_quantity')
            ->where('stock_quantity', '>', 0)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Products fetched successfully.',
            'data' => $products
        ]);
    }
}
