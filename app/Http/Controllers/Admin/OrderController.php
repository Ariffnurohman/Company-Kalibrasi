<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User; // 🔵 Impor Model User untuk Teknisi
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderController extends Controller
{
    public function index()
    {
        // Menggunakan latest() agar orderan terbaru muncul paling atas
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        // 🔵 AMBIL DATA TEKNISI: Agar bisa dipilih di dropdown halaman create
        $technicians = User::where('role', 'technician')->get();
        
        return view('admin.orders.create', compact('technicians'));
    }

    public function store(Request $request)
    {
        // 🔵 TAMBAHKAN VALIDASI: Sesuaikan dengan input baru di form create
        $request->validate([
            'customer_name' => 'required',
            'instrument'    => 'required',
            'status'        => 'required',
            'received_date' => 'required|date',
            'technician_id' => 'nullable|exists:users,id',
            'notes'         => 'nullable',
        ]);

        // 🔵 Generate nomor order otomatis
        $orderNumber = 'ORD-' . time();

        // 🔵 Simpan data order awal (termasuk teknisi, status pilihan, dan catatan)
        $order = Order::create([
            'order_number'  => $orderNumber,
            'customer_name' => $request->customer_name,
            'instrument'    => $request->instrument,
            'status'        => $request->status,            // <── Menangkap status pilihan form
            'received_date' => $request->received_date,     // <── Menangkap tanggal pilihan form
            'technician_id' => $request->technician_id,     // <── Menangkap teknisi penanggung jawab
            'notes'         => $request->notes,             // <── Menangkap catatan tambahan
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
            ->with('success', 'Order created successfully with QR Code and Technician assigned!');
    }

    // 🔵 DETAIL ORDER
    public function show($id)
    {
        // Eager loading relasi 'technician' agar query lebih optimal saat mengambil nama teknisi
        $order = Order::with('technician')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $technicians = User::where('role', 'technician')->get();

        return view('admin.orders.edit', compact('order', 'technicians'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'instrument'    => 'required',
            'status'        => 'required',
            'received_date' => 'required|date',
            'completed_date'=> 'nullable|date',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'customer_name'  => $request->customer_name,
            'instrument'     => $request->instrument,
            'status'         => $request->status,
            'received_date'  => $request->received_date,
            'completed_date' => $request->completed_date,
            'technician_id'  => $request->technician_id,
        ]);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Order deleted.');
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
            'progress'  => 'nullable|string|max:5000', // 💡 Diubah ke nullable agar tidak wajib diisi teks
            'file'      => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Simpan Progress Catatan jika diisi
        $order->workflow_notes = $request->progress;

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('workflow', 'public');
            $order->workflow_file = $path;
        }

        // Jalankan update status otomatis jika diperlukan (bisa disesuaikan dengan 5 status Anda)
        if ($order->status == 'Pending') {
            $order->status = 'Processing';
        }

        $order->save();

        return redirect()
            ->route('technician.orders.show', $order->id)
            ->with('success', 'Workflow berkas kalibrasi berhasil diperbarui!');
    }
}