<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesPickup;  // <-- MODEL BENAR

class AdminPickupController extends Controller
{
    public function index()
    {
        $pickups = SalesPickup::with('sales')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pickups.index', compact('pickups'));
    }

    public function approve($id)
    {
        $pickup = SalesPickup::findOrFail($id); // FIX
        $pickup->status = 'approved';
        $pickup->save();

        // Hilangkan notifikasi
        auth()->user()->notifications()
            ->where('data->pickup_id', $id)
            ->update(['read_at' => now()]);

        return back()->with('success', 'Pickup berhasil di-approve');
    }

    public function reject($id)
    {
        $pickup = SalesPickup::findOrFail($id); // FIX
        $pickup->status = 'rejected';
        $pickup->save();

        // Hilangkan notifikasi
        auth()->user()->notifications()
            ->where('data->pickup_id', $id)
            ->update(['read_at' => now()]);

        return back()->with('success', 'Pickup berhasil di-reject');
    }
}
