<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_products' => Product::count(),
            'low_stock_products' => Product::whereColumn('stock', '<=', 'min_stock')->count(),
            'total_users' => User::count(),
            'recent_orders' => Order::with('user')->latest()->limit(5)->get(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}

