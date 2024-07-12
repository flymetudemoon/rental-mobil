<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PeminjamanController;
use App\Models\JenisKendaraan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('wellcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Untuk Jenis Kendaraan
Route::get('/admin/jenis_kendaraan', [JenisKendaraanController::class, 'index']);

Route::get('/admin/jenis_kendaraan/create', [JenisKendaraanController::class, 'create']);

Route::post('/admin/jenis_kendaraan/store', [JenisKendaraanController::class, 'store']);

Route::get('/admin/jenis_kendaraan/edit/{id}', [JenisKendaraanController::class, 'edit']);

Route::put('/admin/jenis_kendaraan/update/{id}', [JenisKendaraanController::class, 'update']);

Route::delete('/admin/jenis_kendaraan/delete/{id}', [JenisKendaraanController::class, 'destroy']);

// untuk armada 
Route::get('/admin/armada', [ArmadaController::class, 'index']);

Route::get('/admin/armada/create', [ArmadaController::class, 'create']);

Route::post('/admin/armada/store', [ArmadaController::class, 'store']);

Route::get('/admin/armada/edit/{id}', [ArmadaController::class, 'edit']);

Route::put('/admin/armada/update/{id}', [ArmadaController::class, 'update']);

Route::delete('/admin/armada/delete/{id}', [ArmadaController::class, 'destroy']);

// untuk peminjaman
Route::get('/admin/peminjaman', [PeminjamanController::class, 'index']);

Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create']);

Route::post('/admin/peminjaman/store', [PeminjamanController::class, 'store']);

Route::get('/admin/peminjaman/edit/{id}', [PeminjamanController::class, 'edit']);

Route::put('/admin/peminjaman/update/{id}', [PeminjamanController::class, 'update']);

Route::delete('/admin/peminjaman/delete/{id}', [PeminjamanController::class, 'destroy']);

// buat pembayaran
Route::get('/admin/pembayaran', [PembayaranController::class, 'index']);

Route::get('/admin/pembayaran/create', [PembayaranController::class, 'create']);

Route::post('/admin/pembayaran/store', [PembayaranController::class, 'store']);

Route::get('/admin/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);

Route::put('/admin/pembayaran/update/{id}', [PembayaranController::class, 'update']);

Route::delete('/admin/pembayaran/delete/{id}', [PembayaranController::class, 'destroy']);
});

require __DIR__.'/auth.php';
