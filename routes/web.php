<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


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
    return view('home');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('show');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::post('/posts/store', [PostController::class, 'store'])->name('store');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
Route::put('/posts/approved/{id}', [PostController::class, 'approved'])->name('approved');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');






