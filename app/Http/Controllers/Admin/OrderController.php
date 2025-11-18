<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required',
        'instrument' => 'required',
        'status' => 'required',
    ]);
        Order::create([
            'order_number' => 'ORD-' . time(),
            'customer_name' => $request->customer_name,
            'instrument' => $request->instrument,
            'status' => 'Pending',
            'received_date' => now(),
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order updated.');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        return back()->with('success', 'Order deleted.');
    }
}

