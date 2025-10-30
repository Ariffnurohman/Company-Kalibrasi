<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VisitorController;
use App\Models\Visitor;
use Carbon\Carbon;

Route::get('/stats', [VisitorController::class, 'index'])->name('stats');

Route::get('/api/visitors', function () {
    return response()->json([
        'total' => Visitor::count(),
        'online' => Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count(),
    ]);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/clients', function () {
    return view('clients');
})->name('clients');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact.index');

Route::post('/contact', [ContactController::class, 'offer'])->name('contact.offer');

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/layanan', 'layanan');
Route::view('/clients', 'clients');
Route::view('/berita', 'berita');
Route::view('/gallery', 'gallery');
Route::view('/contact', 'contact');


Route::prefix('lingkup-kalibrasi')->group(function () {
    Route::view('/dimensi', 'lingkup-kalibrasi.dimensi')->name('kalibrasi.dimensi');
    Route::view('/massa', 'lingkup-kalibrasi.massa')->name('kalibrasi.massa');
    Route::view('/suhu', 'lingkup-kalibrasi.suhu')->name('kalibrasi.suhu');
    Route::view('/tekanan', 'lingkup-kalibrasi.tekanan')->name('kalibrasi.tekanan');
    Route::view('/gaya', 'lingkup-kalibrasi.gaya')->name('kalibrasi.gaya');
    Route::view('/kekerasan', 'lingkup-kalibrasi.kekerasan')->name('kalibrasi.kekerasan');
    Route::view('/volume', 'lingkup-kalibrasi.volume')->name('kalibrasi.volume');
    Route::view('/waktu-frekuensi', 'lingkup-kalibrasi.waktu-frekuensi')->name('kalibrasi.waktu-frekuensi');
    Route::view('/instrumen-analitik', 'lingkup-kalibrasi.instrumen-analitik')->name('kalibrasi.instrumen-analitik');
});

Route::view('/lingkup-kalibrasi/home', 'home');
Route::view('/lingkup-kalibrasi/about', 'about');
Route::view('/lingkup-kalibrasi/layanan', 'layanan');
Route::view('/lingkup-kalibrasi/clients', 'clients');
Route::view('/lingkup-kalibrasi/berita', 'berita');
Route::view('/lingkup-kalibrasi/gallery', 'gallery');
Route::view('/lingkup-kalibrasi/contact', 'contact');


Route::get('/pelatihan', function () {
    return view('pelatihan.index');
})->name('pelatihan.index');
