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

Route::get('/indexWG', 'WgGroupController@index')->name('');
Route::post('/createWG', 'WgGroupController@store')->name('wgGroup.store');
Route::get('/createWG', 'WgGroupController@create')->name('');
Route::get('/indexWG/{id}', 'WgGroupController@show')->name('');
Route::put('/indexWG/{id}', 'WgGroupController@update')->name('');
Route::delete('/indexWG/{id}', 'WgGroupController@destroy')->name('');
Route::get('/indexWG/{id}/edit', 'WgGroupController@edit')->name('');

Route::get('/einkaufsliste', 'ShoppingListController@index')->name('');
Route::post('/einkaufsliste', 'ShoppingListController@store')->name('shoppingList.store');
Route::patch('/einkaufsliste/{shoppingList}', 'ShoppingListController@update')->name('shoppingList.update');

Route::get('/finanzen', 'FinanceController@index')->name('');
Route::post('/finanzen', 'FinanceController@store')->name('finance.store');
Route::delete('/finanzen/{finance}', 'FinanceController@destroy')->name('finance.destroy');

Route::get('/putzplan', 'CleaningPlanController@index')->name('');
Route::post('/putzplan', 'CleaningPlanController@store')->name('cleaningPlan.store');
Route::patch('/putzplan', 'CleaningPlanController@update')->name('cleaningPlan.update');
Route::delete('/putzplan/{cleaningPlan}', 'CleaningPlanController@destroy')->name('cleaningPlan.destroy');

/*Route::get('/helloWorld', 'HelloWorldController@index')->name('helloWorld.index');
Route::get('/helloWorld/create', 'HelloWorldController@create')->name('helloWorld.create');
Route::post('/helloWorld', 'HelloWorldController@store')->name('helloWorld.store');
Route::get('/helloWorld/{helloWorld}', 'HelloWorldController@show')->name('helloWorld.show');
Route::get('/helloWorld/{helloWorld}/edit', 'HelloWorldController@edit')->name('helloWorld.edit');
Route::put('/helloWorld/{helloWorld}', 'HelloWorldController@update')->name('helloWorld.update');
Route::delete('/helloWorld/{helloWorld}', 'HelloWorldController@destroy')->name('helloWorld.destroy');*/

