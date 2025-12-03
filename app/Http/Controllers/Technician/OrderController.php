<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CalibrationResult;

class OrderController extends Controller
{
    // ================
    // LIST ORDER
    // ================
    public function index()
    {
        $orders = Order::where('technician_id', auth()->id())
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('technician.orders.index', compact('orders'));
    }

    // ================
    // DETAIL ORDER
    // ================
    public function show($id)
    {
        $order = Order::where('technician_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $result = CalibrationResult::where('order_id', $order->id)->first();

        return view('technician.orders.show', compact('order', 'result'));
    }

    // ================
    // UPDATE STATUS
    // ================
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $order = Order::where('technician_id', auth()->id())->findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status order berhasil diperbarui!');
    }

    // =====================================================
    //                WORKFLOW – FORM VIEW
    // =====================================================
    public function workflow($id)
    {
        $order = Order::where('technician_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        return view('technician.orders.workflow', compact('order'));
    }

    // =====================================================
    //              WORKFLOW – SIMPAN PROGRESS
    // =====================================================
    public function storeWorkflow(Request $request, $id)
    {
        $order = Order::where('technician_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        // Validasi form
        $request->validate([
            'progress'  => 'required|string|max:5000',
            'file'      => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Simpan Progress
        $order->workflow_notes = $request->progress;

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('workflow', 'public');
            $order->workflow_file = $path;
        }

        // Update status otomatis jika dibutuhkan
        if ($order->status !== 'Completed') {
            $order->status = 'In Progress';
        }

        $order->save();

        return redirect()
            ->route('technician.orders.show', $order->id)
            ->with('success', 'Workflow berhasil diperbarui!');
    }
}
