<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function offer(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'email'     => 'required|email',
            'telepon'   => 'required|string|max:20',
            'layanan'   => 'required|string',
            'pesan'     => 'nullable|string|max:1000',
        ]);

        // Simpan ke database (opsional)
        // Offer::create($request->all());

        return redirect()->route('contact.index')->with('success', 'Penawaran berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
