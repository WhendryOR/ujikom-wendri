<?php

use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/konsumen', KonsumenController::class,['expect'=>['show']]);
Route::resource('/pembayaran', PembayaranController::class,['expect'=>['show']]);
Route::resource('/layanan', LayananController::class,['expect'=>['show']]);
Route::resource('/petugas', PetugasController::class,['expect'=>['show']]);
