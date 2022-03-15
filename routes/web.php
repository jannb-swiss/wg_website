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


Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/verification', [App\Http\Controllers\Auth\VerificationController::class, 'verification'])->name('verification');
Route::get('/chat', [App\Http\Controllers\PageController::class, 'chat'])->name('chat');
Route::get('/clean', [App\Http\Controllers\PageController::class, 'clean'])->name('clean');
Route::get('/finance', [App\Http\Controllers\PageController::class, 'finance'])->name('finance');
Route::get('/shopping', [App\Http\Controllers\PageController::class, 'shopping'])->name('shopping');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
