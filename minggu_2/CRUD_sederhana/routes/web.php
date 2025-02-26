<?php // tag pembuka php

use Illuminate\Support\Facades\Route; // mengimpor fasad Route untuk mendefinisikan rute
use App\Http\Controllers\ItemController; // mengimport ItemController
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

Route::get('/', function () { // mendefinisikan route untuk halaman utama (root)
    return view('welcome'); // mengembalikan tampilan 'welcome' di view welcome.blade.php
});

Route::resource('items', ItemController::class); // membuat route resource (CRUD) dengan controller ItemController 