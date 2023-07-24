<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Utilisez le middleware 'auth' pour protéger la route /user
Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('admin/currencies', 'App\Http\Controllers\Admin\CurrencyController');
Route::apiResource('admin/pairs', 'App\Http\Controllers\Admin\PairController');
Route::apiResource('admin/conversions', 'App\Http\Controllers\Admin\ConversionController');

Route::post('admin/login', [LoginController::class, 'login']);
Route::post('admin/logout', [LoginController::class, 'logout']);
