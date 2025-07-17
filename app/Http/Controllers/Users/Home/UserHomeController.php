<?php

namespace App\Http\Controllers\Users\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->min_price !== null) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price !== null) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->latest()->get();

        return view('Users.Home.index', compact('products'));
    }
}
