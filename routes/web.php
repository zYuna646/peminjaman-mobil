<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['signin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/account', [UserController::class, 'index'])->name('akun.index');
    Route::post('/account/create', [UserController::class, 'create'])->name('akun.create');
    Route::delete('/account/delete/{id}', [UserController::class, 'delete'])->name('akun.delete');
    Route::put('/akun/{id}/update', [UserController::class, 'update'])->name('akun.update');

    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::post('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
    Route::delete('/mobil/delete/{id}', [MobilController::class, 'delete'])->name('mobil.delete');
    Route::put('/mobil/{id}/update', [MobilController::class, 'update'])->name('mobil.update');
    
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('mobil.peminjaman');
    Route::post('/peminjaman/create', [PeminjamanController::class, 'create'])->name('mobil.create');

    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])->name('mobil.riwayat');


    Route::get('/auth/logout', [SessionController::class, 'logout'])->name('logout');
});



Route::get('/auth', [SessionController::class, 'index']);
Route::post('/auth/login', [SessionController::class, 'login'])->name('login');
Route::post('/auth/forget', [SessionController::class, 'forget'])->name('forget');