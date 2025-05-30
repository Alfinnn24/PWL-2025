<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
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
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
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
            Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']); // Menampilkan detail barang dengan AJAX
            Route::get('/import', [KategoriController::class, 'import']); //ajax form upload excel
            Route::post('/import_ajax', [KategoriController::class, 'import_ajax']); //ajax import excel
            Route::get('/export_excel', [KategoriController::class, 'export_excel']); //ajax export excel
            Route::get('/export_pdf', [KategoriController::class, 'export_pdf']); //ajax export pdf
        });

        Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            //barang
            Route::group(['prefix' => 'barang'], function () {
                Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal barang
                Route::post('/list', [BarangController::class, 'list']); // menampilkan data barang dalam json untuk datables
                Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah barang
                Route::post('/', [BarangController::class, 'store']); // menyimpan data barang baru
                Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah barang Ajax
                Route::post('/ajax', [BarangController::class, 'store_ajax']); // Menampilkan data barang baru Ajax
                Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail barang
                Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit barang
                Route::put('/{id}', [BarangController::class, 'update']); // menyimpan perubahan data barang
                Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang
                Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit barang Ajax
                Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Menyimpan perubahan data barang Ajax
                Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete barang Ajax
                Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data barang Ajax
                Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']); // Menampilkan detail barang dengan AJAX
                Route::get('/import', [BarangController::class, 'import']); //ajax form upload excel
                Route::post('/import_ajax', [BarangController::class, 'import_ajax']); //ajax import excel
                Route::get('/export_excel', [BarangController::class, 'export_excel']); //ajax export excel
                Route::get('/export_pdf', [BarangController::class, 'export_pdf']); //ajax export pdf
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
                //stok
                Route::middleware(['authorize:ADM,MNG,STF,CUS'])->group(function () {
                    Route::get('/stok', [StokController::class, 'index']); //menampilkan halaman awal Sarang
                    Route::post('/stok/list', [StokController::class, 'list']); //menampilkan data stok dalam bentuk json untuk db 
                    Route::post('/stok', [StokController::class, 'store']); //menampilkan data stok baru
                    Route::get('/stok/create_ajax', [StokController::class, 'create_ajax']); //menampilkan halaman form tambah stok
                    Route::post('/stok/ajax', [StokController::class, 'store_ajax']); //menyimpan data user baru ajax
                    Route::get('/stok/{id}/show_ajax', [StokController::class, 'show_ajax']); //menampilkan detail stok
                    Route::get('/stok/{id}/edit_ajax', [StokController::class, 'edit_ajax']); //menampilkan halaman edit stok
                    Route::put('/stok/{id}/update_ajax', [StokController::class, 'update_ajax']);
                    Route::get('/stok/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); //mnghapus data stok
                    Route::delete('/stok/{id}/delete_ajax', [StokController::class, 'delete_ajax']); //mnghapus data user
                    Route::delete('/stok/{id}', [StokController::class, 'destroy']); //mnghapus data stok
                    Route::get('stok/import', [StokController::class, 'import']); //ajax import excel
                    Route::post('stok/import_ajax', [StokController::class, 'import_ajax']);
                    Route::get('stok/export_excel', [StokController::class, 'export_excel']);// export excel
                    Route::get('stok/export_pdf', [StokController::class, 'export_pdf']);// export pdf
                });
            });
        });
    });
});