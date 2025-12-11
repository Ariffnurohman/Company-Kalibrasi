<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;

// ADMIN
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\AdminPickupController;

// SALES
use App\Http\Controllers\Sales\SalesDashboardController;
use App\Http\Controllers\Sales\SalesPickupController;
use App\Http\Controllers\Sales\PickupController;
use App\Http\Controllers\Sales\SalesOrderController;

// TECHNICIAN
use App\Http\Controllers\TechnicianDashboardController;
use App\Http\Controllers\Technician\OrderController as TechnicianOrderController;

// QR
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// ===========================
// PUBLIC PAGE
// ===========================
Route::get('/', fn() => view('home'));
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/clients', 'clients')->name('clients');
Route::view('/berita', 'berita')->name('berita');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/contact', 'contact')->name('contact.index');
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


// TRACKING ORDER
Route::get('/tracking/{order_number}', [PublicController::class, 'tracking'])->name('tracking');

// Cek alat
Route::get('/cek-alat', [PublicController::class, 'cekAlat'])->name('cek.alat');
Route::post('/cek-alat', [PublicController::class, 'cekAlatProcess'])->name('cek.alat.process');

// ===========================
// ADMIN ROUTES
// ===========================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD ORDER
        Route::resource('orders', AdminOrderController::class);

        // Profile Admin
        Route::get('/profile', [AdminDashboardController::class, 'profile'])
            ->name('profile');

        Route::put('/profile', [AdminDashboardController::class, 'updateProfile'])
            ->name('profile.update');

        // ============================
        //   PICKUP ALAT (ADMIN)
        // ============================
        Route::prefix('pickups')->name('pickups.')->group(function () {

            // Halaman daftar pickup
            Route::get('/', [AdminPickupController::class, 'index'])->name('index');

            // Approve & Reject
            Route::post('/{id}/approve', [AdminPickupController::class, 'approve'])->name('approve');
            Route::post('/{id}/reject', [AdminPickupController::class, 'reject'])->name('reject');
        });
    });


// ===========================
// SALES ROUTES
Route::middleware(['auth', 'role:sales'])
    ->prefix('sales')
    ->name('sales.')
    ->group(function () {

        // 🟦 Dashboard
        Route::get('/dashboard', [SalesDashboardController::class, 'index'])
            ->name('dashboard');

        // 🟦 Orders untuk Sales
        Route::get('/orders', [SalesOrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [SalesOrderController::class, 'show'])
            ->name('orders.show');


        // 🟦 PICKUPS (Complete CRUD + History)
        Route::controller(SalesPickupController::class)->group(function () {

            // List semua pickup milik sales
            Route::get('/pickup', 'index')->name('pickup.index');

            // Form create pickup
            Route::get('/pickup/create', 'create')->name('pickup.create');

            // Simpan pickup
            Route::post('/pickup/store', 'store')->name('pickup.store');

            // Edit pickup
            Route::get('/pickup/{pickup}/edit', 'edit')->name('pickup.edit');

            // Update pickup
            Route::put('/pickup/{pickup}', 'update')->name('pickup.update');

            // Hapus pickup
            Route::delete('/pickup/{pickup}', 'destroy')->name('pickup.destroy');

            // History pickup selesai atau dibatalkan
            Route::get('/pickup/history', 'history')->name('pickup.history');
        });
    });


// ===========================
// TECHNICIAN ROUTES
// ===========================
Route::middleware(['auth', 'role:technician'])
    ->prefix('technician')
    ->name('technician.')
    ->group(function () {

        // PROFILE TEKNISI
        Route::get('/profile', [TechnicianDashboardController::class, 'profile'])
            ->name('profile');

        Route::put('/profile', [TechnicianDashboardController::class, 'updateProfile'])
            ->name('profile.update');

        Route::get('/dashboard', [TechnicianDashboardController::class, 'index'])->name('dashboard');

        // List order
        Route::get('/orders', [TechnicianOrderController::class, 'index'])->name('orders.index');

        // Detail
        Route::get('/orders/{id}', [TechnicianOrderController::class, 'show'])->name('orders.show');

        // Update status    
        Route::put('/orders/{id}/update-status', [TechnicianOrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Workflow
        Route::get('/orders/{id}/workflow', [TechnicianOrderController::class, 'workflow'])->name('orders.workflow');
        Route::post('/orders/{id}/workflow', [TechnicianOrderController::class, 'storeWorkflow'])->name('orders.workflow.store');
    });


// ===========================
// QR CODE DOWNLOAD
// ===========================
Route::get('/download-qr/{order}', function ($order) {

    $url = url('/tracking/' . $order);

    $qr = QrCode::format('svg')->size(300)->generate($url);

    return response($qr)
        ->header('Content-Type', 'image/png')
        ->header('Content-Disposition', 'attachment; filename="QR-' . $order . '.png"');
})->name('download.qr');

// ===========================
// AUTH ROUTES (Breeze)
// ===========================
require __DIR__ . '/auth.php';


// ===========================
// UTILITIES
// ===========================
Route::get('/force-logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return 'LOGOUT SUCCESS';
});

Route::get('/qr-test', function () {
    return QrCode::format('svg')->size(200)->generate('QR Test');
});
