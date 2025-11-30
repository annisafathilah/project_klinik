<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;

// ----------------------------
// Auth routes
// ----------------------------
Auth::routes();

// ----------------------------
// Routes yang perlu login
// ----------------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']); // optional: /home sama dengan /

    // CRUD Pasien
    Route::resource('pasien', PasienController::class);

    // CRUD Poli
    Route::resource('poli', PoliController::class);

    // Menu lain: placeholder sementara
    Route::get('/daftar', function() {
        $title = 'Pendaftaran';
        return view('coming-soon', compact('title'));
    });

    Route::get('/users', function() {
        $title = 'Pengguna';
        return view('coming-soon', compact('title'));
    });
});
