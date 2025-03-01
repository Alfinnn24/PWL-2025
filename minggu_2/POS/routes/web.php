<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'Home']);
Route::prefix('produk')->group(function () {
    Route::get('/category/food-beverage', [ProductController::class, 'FnB']);
    Route::get('/category/beauty-health', [ProductController::class, 'BH']);
    Route::get('/category/home-care', [ProductController::class, 'HC']);
    Route::get('/category/baby-kid', [ProductController::class, 'BK']);
});
Route::get('/user/{id}/name/{name}',[UserController::class,'About']);
Route::get('/transaksi',[TransaksiController::class,'Transaksi']);