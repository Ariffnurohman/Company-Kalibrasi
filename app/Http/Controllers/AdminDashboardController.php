<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total semua order
        $totalOrders = Order::count();

        // Order yang sudah selesai
        $completedOrders = Order::where('status', 'Completed')->count();

        // Data chart bulanan
        $salesData = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month');

        // Order terbaru
        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'completedOrders',
            'salesData',
            'latestOrders'
        ));
    }
}
