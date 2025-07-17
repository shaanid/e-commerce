<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function placeOrder()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['status' => false, 'message' => 'Your cart is empty.'], 400);
        }

        $total = 0;

        foreach ($cartItems as $item) {
            if ($item->product->stock_quantity < $item->quantity) {
                return response()->json([
                    'status' => false,
                    'message' => "Insufficient stock for {$item->product->name}."
                ], 400);
            }
            $total += $item->product->price * $item->quantity;
        }

        $order = $user->orders()->create([
            'total_price' => $total,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
            $item->product->decrement('stock_quantity', $item->quantity);
        }
        $user->cartItems()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Order placed successfully.',
            'order_id' => $order->id,
            'total_price' => $order->total_price,
        ]);
    }
}
