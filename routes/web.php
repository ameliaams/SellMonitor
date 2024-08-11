<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profil', [SalesController::class, 'show'])->name('profil');
// Menampilkan daftar customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

// Menampilkan formulir untuk menambah customer
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

// Menyimpan customer baru
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');

// Menampilkan detail customer spesifik
Route::get('/customer/{customer}', [CustomerController::class, 'show'])->name('customer.show');
