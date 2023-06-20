<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInformationController;
use App\Http\Controllers\UnitController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/informasi-produk', [ProductInformationController::class, 'index']);
Route::resource('manage-user', UserController::class);
Route::resource('manage-kategori', CategoryController::class);
Route::resource('manage-satuan', UnitController::class);
Route::resource('manage-produk', ProductController::class);
Route::resource('manage-multiharga', UserController::class);

Route::get('login', function () {
    return view('login');
});