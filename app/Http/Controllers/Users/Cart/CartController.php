<?php

namespace App\Http\Controllers\Users\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartQuantityRequest;
use App\Mail\OrderPlacedMail;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();

        return view('Users.Cart.index', compact('cartItems'));
    }

    public function add(Product $product)
    {
        $user = Auth::user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id'    => $user->id,
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id === Auth::id()) {
            $cart->delete();
        }

        return redirect()->back()->with('success', 'Item removed');
    }

    public function view()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();

        return view('Users.Cart.index', compact('cartItems'));
    }

    public function update(CartQuantityRequest $request, Cart $cart)
    {
        if ($cart->user_id === Auth::id()) {
            $cart->update([
                'quantity' => $request->quantity,
            ]);
            return redirect()->back()->with('success', 'Quantity updated.');
        }

        return redirect()->back()->with('error', 'something went wrong.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = $user->orders()->create([
            'total_price' => $total
        ]);

        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);

            $item->product->decrement('stock_quantity', $item->quantity);
        }
        $user->cartItems()->delete();

        $order->load('items.product', 'user');
        Mail::to($user->email)->send(new OrderPlacedMail($order));

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }
}
