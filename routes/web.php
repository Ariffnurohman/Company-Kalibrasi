<?php

use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\PublicController;
use App\Models\Visitor;
use Carbon\Carbon;

Route::get('/', function () {
    return view('home');
});

/// ROUTE ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    });

Route::get('/tracking/{order_number}', [PublicController::class, 'tracking']);



Route::get('/download-qr/{order}', function ($order) {

    $url = url('/tracking/' . $order);

    $qr = QrCode::format('svg')
        ->size(300)
        ->generate($url);

    return response($qr)
        ->header('Content-Type', 'image/png')
        ->header('Content-Disposition', 'attachment; filename="QR-' . $order . '.png"');
})->name('download.qr');

/// ROUTE TEKNISI
Route::middleware(['auth', 'role:technician'])
    ->prefix('technician')
    ->name('technician.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [\App\Http\Controllers\TechnicianDashboardController::class, 'index']
        )->name('dashboard');

        // LIST ORDER
        Route::get(
            '/orders',
            [\App\Http\Controllers\Technician\OrderController::class, 'index']
        )->name('orders.index');

        // DETAIL ORDER
        Route::get(
            '/orders/{id}',
            [\App\Http\Controllers\Technician\OrderController::class, 'show']
        )->name('orders.show');

        // UPDATE STATUS (mulai, progress, selesai)
        Route::put(
            '/orders/{id}/update-status',
            [\App\Http\Controllers\Technician\OrderController::class, 'updateStatus']
        )->name('orders.updateStatus');

        // FORM INPUT / UPLOAD DATA KALIBRASI
        Route::get(
            '/orders/{id}/workflow',
            [\App\Http\Controllers\Technician\OrderController::class, 'workflow']
        )->name('orders.workflow');

        Route::post(
            '/orders/{id}/workflow',
            [\App\Http\Controllers\Technician\OrderController::class, 'storeWorkflow']
        )->name('orders.workflow.store');
    });

// Form cek alat (landing page)
Route::get('/cek-alat', [\App\Http\Controllers\PublicController::class, 'cekAlat'])->name('cek.alat');

// Proses pencarian order
Route::post('/cek-alat', [\App\Http\Controllers\PublicController::class, 'cekAlatProcess'])->name('cek.alat.process');



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

Route::get('/our-service', function () {
    return view('our-service');
})->name('our.service');


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
require __DIR__ . '/auth.php';


// Rahasia

Route::get('/force-logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return 'LOGOUT SUCCESS';
});

Route::get('/qr-test', function () {
    return QrCode::format('svg')->size(200)->generate('Arif QR Test');
});
