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






/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('verified\dashboard');})->name('dashboard');*/

Route::get('/dashboard', 'WgGroupController@index')->name('dashboard');
Route::post('/dashboard', 'WgGroupController@store')->name('wgGroup.store');

Route::get('/modifyUser','UserController@index')->name('');

Route::get('/createWG', 'WgGroupController@index')->name('');
Route::post('/createWG', 'WgGroupController@store')->name('wgGroup.store');

