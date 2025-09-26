<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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

