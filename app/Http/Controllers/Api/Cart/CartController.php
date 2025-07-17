<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $items = Auth::user()->cartItems()->with('product')->get();

        return response()->json([
            'status' => true,
            'data' => $items
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock_quantity < $request->quantity) {
            return response()->json(['status' => false, 'message' => 'Not enough stock.'], 400);
        }

        $existing = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            $existing->quantity += $request->quantity;
            $existing->save();
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => $request->quantity
            ]);
        }

        return response()->json(['status' => true, 'message' => 'Product added to cart.']);
    }

    public function remove($id)
    {
        $item = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$item) {
            return response()->json(['status' => false, 'message' => 'Item not found.'], 404);
        }

        $item->delete();

        return response()->json(['status' => true, 'message' => 'Item removed from cart.']);
    }
}
