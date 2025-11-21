<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
{
    $totalOrders = Order::count();
    $totalRevenue = Order::sum('total_price');
    $completedOrders = Order::where('status', 'completed')->count();
    $pendingOrders = Order::where('status', 'pending')->count();

    // --- Chart Data ---
    $months = [];
    $ordersChart = [];
    $revenueChart = [];

    for ($i = 1; $i <= 12; $i++) {
        $months[] = date("M", mktime(0,0,0,$i,1));

        $ordersChart[] = Order::whereMonth('created_at', $i)->count();
        $revenueChart[] = Order::whereMonth('created_at', $i)->sum('total_price');
    }

    $recentOrders = Order::latest()->take(6)->get();

    return view('admin.dashboard', compact(
        'totalOrders', 'totalRevenue', 'completedOrders', 'pendingOrders',
        'months', 'ordersChart', 'revenueChart', 'recentOrders'
    ));
}

}
