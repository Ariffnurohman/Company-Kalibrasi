<?php

use Illuminate\Support\Facades\Route;


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

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/layanan', 'layanan');
Route::view('/clients', 'clients');
Route::view('/berita', 'berita');
Route::view('/gallery', 'gallery');
Route::view('/kontak', 'kontak');
