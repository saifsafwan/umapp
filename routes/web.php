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

Route::view('/', 'welcome')->name('homepage');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['accountant'])->group(function () {
    Route::view('/accountant', 'users.accountant.dashboard')->name('accountant.dashboard');
    // Route::view('/accountant/budget', 'users.accountant.budget.new');
    Route::resource('/accountant/budget', 'BudgetController');
    Route::resource('/accountant/budget/item', 'ItemController')->except([
        'create',
    ]);
    Route::get('/accountant/budget/{id}/item/create', 'ItemController@create')->name('item.create');
});

Route::middleware(['dean'])->group(function () {
    Route::view('/dean', 'users.dean.dashboard')->name('dean.dashboard');
});

Route::middleware(['bursary'])->group(function () {
    Route::view('/bursary', 'users.bursary.dashboard')->name('bursary.dashboard');
});

