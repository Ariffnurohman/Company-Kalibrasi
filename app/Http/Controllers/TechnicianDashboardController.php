<?php

namespace App\Http\Controllers;

use App\Models\Order;

class TechnicianDashboardController extends Controller
{
    public function index()
    {
        $assignedOrders = Order::where('technician_id', auth()->id())->count();
        $completed = Order::where('technician_id', auth()->id())
                          ->where('status', 'Completed')->count();
        $inProgress = Order::where('technician_id', auth()->id())
                           ->whereIn('status', ['Processing','Calibration'])->count();

        $recentOrders = Order::where('technician_id', auth()->id())
                             ->latest()->take(5)->get();

        return view('technician.dashboard', compact(
            'assignedOrders', 'completed', 'inProgress', 'recentOrders'
        ));
    }
}
