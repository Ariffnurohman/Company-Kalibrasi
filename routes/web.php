<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Models\Visitor;
use Carbon\Carbon;

Route::get('/', function () {
    return view('home');
});

/// ROUTE ADMIN
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', OrderController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
});


// Stats
Route::get('/stats', [VisitorController::class, 'index'])->name('stats');

Route::get('/api/visitors', function () {
    return response()->json([
        'total' => Visitor::count(),
        'online' => Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count(),
    ]);
});


// Halaman utama
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/clients', 'clients')->name('clients');
Route::view('/berita', 'berita')->name('berita');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/contact', 'contact')->name('contact.index');


// Contact Form
Route::post('/contact', [ContactController::class, 'offer'])->name('contact.offer');


// Lingkup Kalibrasi
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


// Halaman Pelatihan
Route::view('/pelatihan', 'pelatihan.index')->name('pelatihan.index');


// *** Route Auth dari Breeze ***
require __DIR__.'/auth.php';


// Rahasia

Route::get('/force-logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return 'LOGOUT SUCCESS';
});
