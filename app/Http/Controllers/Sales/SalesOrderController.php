<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * List semua order milik sales login
     */
    public function index(Request $request)
    {
        $query = Order::where('sales_id', auth()->id());

        // Filtering status (optional)
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();

        return view('sales.orders.index', compact('orders'));
    }

    /**
     * Detail order
     */
    public function show(Order $order)
    {
        // Pastikan Sales tidak bisa akses order milik sales lain
        if ($order->sales_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('sales.orders.show', compact('order'));
    }
}
