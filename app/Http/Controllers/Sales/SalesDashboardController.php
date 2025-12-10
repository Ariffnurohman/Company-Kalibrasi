<?php

namespace App\Http\Controllers\Sales;


use App\Http\Controllers\Controller;
use App\Models\Pickup;
use Illuminate\Http\Request;

class SalesDashboardController extends Controller
{
    public function index()
    {
        $salesId = auth()->id();
    
        $totalPickups = Pickup::where('sales_id', $salesId)->count();
        $pendingPickups = Pickup::where('sales_id', $salesId)
                                ->where('status', 'pending')
                                ->count();
        $completedPickups = Pickup::where('sales_id', $salesId)
                                  ->where('status', 'approved')
                                  ->count();
    
        // RIWAYAT TERBARU (tampilkan 5 data)
        $recentPickups = Pickup::where('sales_id', $salesId)
                               ->latest()
                               ->take(5)
                               ->get();
    
        return view('sales.dashboard', compact(
            'totalPickups',
            'pendingPickups',
            'completedPickups',
            'recentPickups'
        ));
    }
}
