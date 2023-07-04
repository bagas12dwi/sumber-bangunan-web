<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MultiPriceController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/informasi-produk', [ProductInformationController::class, 'index']);
    Route::resource('manage-user', UserController::class);
    Route::resource('manage-kategori', CategoryController::class);
    Route::resource('manage-satuan', UnitController::class);
    Route::resource('manage-produk', ProductController::class);
    Route::resource('manage-multiharga', MultiPriceController::class);
});

Route::get('/', [HomepageController::class, 'index']);

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
