<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPickup;

class SalesDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalPickups     = SalesPickup::where('sales_id', $userId)->count();
        $pendingPickups   = SalesPickup::where('sales_id', $userId)->where('status', 'pending')->count();
        $completedPickups = SalesPickup::where('sales_id', $userId)->where('status', 'completed')->count();
        $recentPickups    = SalesPickup::where('sales_id', $userId)->latest()->take(5)->get();

        return view('sales.dashboard', compact(
            'totalPickups',
            'pendingPickups',
            'completedPickups',
            'recentPickups'
        ));
    }
}
