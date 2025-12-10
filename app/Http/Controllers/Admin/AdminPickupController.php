<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickup;

class AdminPickupController extends Controller
{
    public function index()
    {
        // Pickup pending
        $pendingPickups = Pickup::with(['order', 'sales'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
    
        // History pickup
        $history = Pickup::with(['order', 'sales'])
            ->where('status', '!=', 'pending')
            ->orderBy('updated_at', 'desc')
            ->get();
    
        return view('admin.pickups.index', [
            'pendingPickups' => $pendingPickups,
            'history'        => $history, // <-- HARUS history
        ]);
    }


    public function approve($id)
    {
        $pickup = Pickup::findOrFail($id);
    
        $pickup->update([
            'status' => 'approved'
        ]);
    
        return redirect()->back()->with('success', 'Pickup berhasil disetujui.');
    }
    
    public function reject($id)
    {
        $pickup = Pickup::findOrFail($id);
    
        $pickup->update([
            'status' => 'rejected'
        ]);
    
        return redirect()->back()->with('success', 'Pickup berhasil ditolak.');
    }
}
