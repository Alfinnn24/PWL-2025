<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;

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

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::get('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', [WelcomeController::class, 'index']);

// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [UserController::class, 'index']);
//     Route::post('/list', [UserController::class, 'list']);
//     Route::get('/create', [UserController::class, 'create']);
//     Route::post('/', [UserController::class, 'store']);
//     Route::get('/create_ajax', [UserController::class, 'create_ajax']);
//     Route::post('/ajax', [UserController::class, 'store_ajax']);
//     Route::get('/{id}', [UserController::class, 'show']);
//     Route::get('/{id}/edit', [UserController::class, 'edit']);
//     Route::put('/{id}', [UserController::class, 'update']);
//     Route::delete('/{id}', [UserController::class, 'destroy']);
//     Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
// });

// Route::group(['prefix' => 'level'], function () {
//     Route::get('/', [LevelController::class, 'index']);
//     Route::post('/list', [LevelController::class, 'list']);
//     Route::get('/create', [LevelController::class, 'create']);
//     Route::post('/', [LevelController::class, 'store']);
//     Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
//     Route::post('/ajax', [LevelController::class, 'store_ajax']);
//     Route::get('/{id}', [LevelController::class, 'show']);
//     Route::get('/{id}/edit', [LevelController::class, 'edit']);
//     Route::put('/{id}', [LevelController::class, 'update']);
//     Route::delete('/{id}', [LevelController::class, 'destroy']);
//     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
// });

// Route::group(['prefix' => 'kategori'], function () {
//     Route::get('/', [KategoriController::class, 'index']);
//     Route::post('/list', [KategoriController::class, 'list']);
//     Route::get('/create', [KategoriController::class, 'create']);
//     Route::post('/', [KategoriController::class, 'store']);
//     Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
//     Route::post('/ajax', [KategoriController::class, 'store_ajax']);
//     Route::get('/{id}', [KategoriController::class, 'show']);
//     Route::get('/{id}/edit', [KategoriController::class, 'edit']);
//     Route::put('/{id}', [KategoriController::class, 'update']);
//     Route::delete('/{id}', [KategoriController::class, 'destroy']);
//     Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
// });

// Route::group(['prefix' => 'supplier'], function () {
//     Route::get('/', [SupplierController::class, 'index']);
//     Route::post('/list', [SupplierController::class, 'list']);
//     Route::get('/create', [SupplierController::class, 'create']);
//     Route::post('/', [SupplierController::class, 'store']);
//     Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
//     Route::post('/ajax', [SupplierController::class, 'store_ajax']);
//     Route::get('/{id}', [SupplierController::class, 'show']);
//     Route::get('/{id}/edit', [SupplierController::class, 'edit']);
//     Route::put('/{id}', [SupplierController::class, 'update']);
//     Route::delete('/{id}', [SupplierController::class, 'destroy']);
//     Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
// });

// Route::group(['prefix' => 'barang'], function () {
//     Route::get('/', [BarangController::class, 'index']);
//     Route::post('/list', [BarangController::class, 'list']);
//     Route::get('/create', [BarangController::class, 'create']);
//     Route::post('/', [BarangController::class, 'store']);
//     Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
//     Route::post('/ajax', [BarangController::class, 'store_ajax']);
//     Route::get('/{id}', [BarangController::class, 'show']);
//     Route::get('/{id}/edit', [BarangController::class, 'edit']);
//     Route::put('/{id}', [BarangController::class, 'update']);
//     Route::delete('/{id}', [BarangController::class, 'destroy']);
//     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
// });

//auth
Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post(('login'), [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

//register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [WelcomeController::class, 'index']);

    Route::middleware(['authorize:ADM'])->group(function () {
        //level
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
        });

        //user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/list', [UserController::class, 'list']);
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/create_ajax', [UserController::class, 'create_ajax']);
            Route::post('/ajax', [UserController::class, 'store_ajax']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::get('/{id}/edit', [UserController::class, 'edit']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,CUS'])->group(function () {
        //kategori
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::post('/list', [KategoriController::class, 'list']);
            Route::get('/create', [KategoriController::class, 'create']);
            Route::post('/', [KategoriController::class, 'store']);
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);
            Route::get('/{id}', [KategoriController::class, 'show']);
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);
            Route::put('/{id}', [KategoriController::class, 'update']);
            Route::delete('/{id}', [KategoriController::class, 'destroy']);
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        });

        Route::middleware(['authorize:ADM,MNG'])->group(function () {
            //barang
            Route::group(['prefix' => 'barang'], function () {
                Route::get('/', [BarangController::class, 'index']);
                Route::post('/list', [BarangController::class, 'list']);
                Route::get('/create', [BarangController::class, 'create']);
                Route::post('/', [BarangController::class, 'store']);
                Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
                Route::post('/ajax', [BarangController::class, 'store_ajax']);
                Route::get('/{id}', [BarangController::class, 'show']);
                Route::get('/{id}/edit', [BarangController::class, 'edit']);
                Route::put('/{id}', [BarangController::class, 'update']);
                Route::delete('/{id}', [BarangController::class, 'destroy']);
                Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
                Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
                Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
                Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
            });

            Route::middleware(['authorize:ADM,MNG'])->group(function () {
                //supplier
                Route::group(['prefix' => 'supplier'], function () {
                    Route::get('/', [SupplierController::class, 'index']);
                    Route::post('/list', [SupplierController::class, 'list']);
                    Route::get('/create', [SupplierController::class, 'create']);
                    Route::post('/', [SupplierController::class, 'store']);
                    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
                    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
                    Route::get('/{id}', [SupplierController::class, 'show']);
                    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
                    Route::put('/{id}', [SupplierController::class, 'update']);
                    Route::delete('/{id}', [SupplierController::class, 'destroy']);
                    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
                    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
                    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
                    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
                });
            });
        });
    });
});