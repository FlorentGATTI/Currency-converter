<?php

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

Route::resource('/admin/currencies', 'App\Http\Controllers\Admin\CurrencyController');
Route::resource('/admin/pairs', 'App\Http\Controllers\Admin\PairController');
Route::resource('/admin/conversions', 'App\Http\Controllers\Admin\ConversionController');


Route::get('/', function () {
    return view('documentation');
});
