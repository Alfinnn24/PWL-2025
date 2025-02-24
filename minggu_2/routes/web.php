<?php

use Illuminate\Support\Facades\Route; // mengimpor kelas Route untuk mendefinisikan rute
use App\Http\Controllers\ItemController; // mengimpor ItemController untuk menangani permintaan terkait item
use App\Http\Controllers\UserProfileController;
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
Route::resource('items', ItemController::class); // resource controller dengan nama items dari controller ItemController

Route::get('/user/profile', function () {
    return 'selamat datang';
   })->name('profile');

   Route::get('/user/profile',[UserProfileController::class, 'index']
   )->name('profile');