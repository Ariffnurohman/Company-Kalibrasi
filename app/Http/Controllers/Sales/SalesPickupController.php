<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Pickup;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesPickupController extends Controller
{
    public function create()
    {
        // Ambil semua order yang pending
        // atau sesuai filter yang kamu butuhkan
        $orders = Order::where('status', 'Pending')->get();

        return view('sales.pickup.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'pickup_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Pickup::create([
            'order_id' => $request->order_id,
            'sales_id' => auth()->id(),
            'pickup_date' => $request->pickup_date,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('sales.pickup.history')
            ->with('success', 'Pickup berhasil dibuat.');
    }

    public function history()
    {
        // Ambil hanya pickup milik sales login
        $pickups = Pickup::where('sales_id', auth()->id())
            ->whereIn('status', ['completed', 'cancelled', 'done']) // sesuaikan statusmu
            ->latest()
            ->get();

        return view('sales.pickup.history', compact('pickups'));
    }
}
