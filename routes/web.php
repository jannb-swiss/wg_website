<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', 'PageController@home')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');
Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/verification', 'Auth\VerificationController@verification')->name('verification');
Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');



/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('verified\dashboard');})->name('dashboard');*/

Auth::routes();


