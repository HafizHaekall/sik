<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister')->middleware('guest');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [TransaksiController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::resource('barang', BarangController::class)->except(['show']);
// Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
// Route::post('barang', [BarangController::class, 'store'])->name('barang.store');

// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

Route::resource('transaksi', TransaksiController::class)->except(['show']);
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::get('/transaksi/nota/{id}', [TransaksiController::class, 'notaTransaksi'])->name('transaksi.nota');