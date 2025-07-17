<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Layouts.app');
    }

    public function view()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');

        return view('Admin.Dashboard.index', compact('totalOrders', 'totalRevenue'));
    }
}
