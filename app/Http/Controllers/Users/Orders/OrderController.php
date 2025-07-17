<?php

namespace App\Http\Controllers\Users\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function history()
    {
        $orders = Auth::user()
            ->orders()
            ->latest()
            ->get();

        return view('Users.Orders.history', compact('orders'));
    }
}
