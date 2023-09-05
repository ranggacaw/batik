<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testing', function () {
    return view('testing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update']);

// Pesan
Route::get('/pesan/{id}', [App\Http\Controllers\PesanController::class, 'index'])->name('pesan.index');
Route::post('/pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan']);

// Checkout
Route::get('/checkout', [App\Http\Controllers\PesanController::class, 'checkout']);
Route::delete('/pussy/{id}', [App\Http\Controllers\PesanController::class, 'delete']);
Route::get('/checkout-confirm', [App\Http\Controllers\PesanController::class, 'confirm']);

// History
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index']);
Route::get('/history-detail/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
