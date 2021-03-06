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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/modifyUser','UserController@index')->name('');

Route::get('/wg', 'WgGroupController@index')->name('');
Route::patch('/wg', 'WgGroupController@update')->name('wgGroup.update');
Route::post('/createWG', 'WgGroupController@store')->name('wgGroup.store');
Route::get('/createWG', 'WgGroupController@create')->name('');
Route::get('/wg/{id}', 'WgGroupController@show')->name('');
Route::put('/wg/{id}', 'WgGroupController@update')->name('');
Route::delete('/wg/{id}', 'WgGroupController@destroy')->name('');
Route::get('/wg/{id}/edit', 'WgGroupController@edit')->name('');

Route::get('/einkaufsliste', 'ShoppingListController@index')->name('');
Route::post('/einkaufsliste', 'ShoppingListController@store')->name('shoppingList.store');
Route::delete('/einkaufsliste/{shoppingList}', 'ShoppingListController@destroy')->name('shoppingList.destroy');

Route::get('/finanzen', 'FinanceController@index')->name('');
Route::post('/finanzen', 'FinanceController@store')->name('finance.store');
Route::delete('/finanzen/{finance}', 'FinanceController@destroy')->name('finance.destroy');

Route::get('/chat', 'ChatController@index');
Route::get('/messages', 'ChatController@fetchMessages');
Route::post('/messages', 'ChatController@sendMessage');


Route::get('/putzplan', 'CleaningPlanController@index')->name('');
Route::post('/putzplan', 'CleaningPlanController@store')->name('cleaningPlan.store');
Route::delete('/putzplan/{cleaningPlan}', 'CleaningPlanController@destroy')->name('cleaningPlan.destroy');


Route::get('/mitglied', 'AddUserController@index')->name('');
Route::post('/mitglied', 'AddUserController@inviteUser')->name('addUser');

