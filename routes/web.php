<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/auth',[SessionController::class, 'index']);
Route::post('/auth/login',[SessionController::class, 'login'])->name('login');
Route::post('/auth/logout',[SessionController::class, 'logout'])->name('logout');
Route::post('/auth/forget',[SessionController::class, 'forget'])->name('forget');

