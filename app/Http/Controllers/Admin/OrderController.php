<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    ]);

    // 🔵 Generate nomor order
    $orderNumber = 'ORD-' . time();

    // 🔵 Simpan order awal
    $order = Order::create([
        'order_number'   => $orderNumber,
        'customer_name'  => $request->customer_name,
        'instrument'     => $request->instrument,
        'status'         => 'Pending',
        'received_date'  => now(),
    ]);

    // 🔵 Buat URL tracking
    $qrURL = url('/tracking/' . $order->order_number);

    // 🔵 Generate QR format base64
    $qrImage = base64_encode(
        QrCode::format('svg')->size(300)->generate($qrURL)
    );

    // 🔵 Simpan QR ke database
    $order->update([
        'qr_code' => $qrImage
    ]);

    return redirect()->route('admin.orders.index')
        ->with('success', 'Order created successfully with QR Code!');
}


    // 🔵 DETAIL ORDER
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

   public function edit($id)
{
    $order = Order::findOrFail($id);
    $technicians = \App\Models\User::where('role', 'technician')->get();

    return view('admin.orders.edit', compact('order', 'technicians'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'customer_name' => 'required',
        'instrument'    => 'required',
        'status'        => 'required',
        'technician_id' => 'nullable|exists:users,id',
    ]);

    $order = Order::findOrFail($id);

    $order->update([
        'customer_name'  => $request->customer_name,
        'instrument'     => $request->instrument,
        'status'         => $request->status,
        'received_date'  => $request->received_date,
        'completed_date' => $request->completed_date,
        'technician_id'  => $request->technician_id,  // <── WAJIB ADA
    ]);

    return redirect()->route('admin.orders.index')
        ->with('success', 'Order updated successfully!');
}



    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Order deleted.');
    }
}
