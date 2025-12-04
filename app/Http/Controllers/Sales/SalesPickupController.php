<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\SalesPickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SalesPickupRequest;
use App\Models\User;

class SalesPickupController extends Controller
{
    public function create()
    {
        return view('sales.pickup.create'); // buat file blade untuk form pickup
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|string',
            'equipment' => 'required|string',
            'pickup_date' => 'required|date',
        ]);
    
        // Simpan request pengambilan
        $pickup = \App\Models\SalesPickup::create([
            'sales_id' => auth()->id(),
            'customer' => $request->customer,
            'equipment' => $request->equipment,
            'pickup_date' => $request->pickup_date,
            'status' => 'pending',
        ]);
    
        // Kirim notifikasi ke semua admin
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new SalesPickupRequest($pickup));
        }
    
        return back()->with('success', 'Request pengambilan alat berhasil dikirim.');
    }
}
