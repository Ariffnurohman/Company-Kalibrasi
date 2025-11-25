<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('technician_id', auth()->id())
                        ->orderBy('updated_at', 'desc')
                        ->paginate(10); // WAJIB untuk links()

        return view('technician.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('technician_id', auth()->id())
                      ->where('id', $id)
                      ->firstOrFail();

        return view('technician.orders.show', compact('order'));
    }
}

