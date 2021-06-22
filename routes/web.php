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

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', [\App\Http\Controllers\ProductController::class, 'showHomePage']);
Route::post('add/product', [\App\Http\Controllers\ProductController::class, 'saveProduct']);
