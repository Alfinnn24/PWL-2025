<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', [WelcomeController::class, 'hello']);
Route::get('/world', function () {
    return 'World';
});
// Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . ' Komentar ke-' . $commentId;
});
Route::get('/articles/{id}', [PageController::class, 'articles']);
Route::get('/user/{name?}', function ($name = 'Jhon') {
    return 'Nama saya ' . $name;
});
Route::get('/user/profile', function () {
    return 'Profile';
})->name('profile');
// Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

/// View
Route::get('/greeting', [WelcomeController::class,'greeting']);