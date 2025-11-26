<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PublicController extends Controller
{
    public function cekAlat()
    {
        return view('landing.cek-alat');
    }

    public function cekAlatProcess(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);

        $keyword = $request->keyword;

        // Cek berdasarkan nomor order ATAU nama PT (customer_name)
        $orders = Order::where('order_number', 'LIKE', "%$keyword%")
            ->orWhere('customer_name', 'LIKE', "%$keyword%")
            ->get();

        return view('landing.cek-alat', compact('orders', 'keyword'));
    }
    
     public function tracking($order_number)
    {
        $order = Order::where('order_number', $order_number)->firstOrFail();

        return view('landing.tracking', compact('order'));
    }
}
