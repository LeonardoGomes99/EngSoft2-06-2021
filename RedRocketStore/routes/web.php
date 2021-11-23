<?php

use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index']);

Route::post('/authenticatedLogin', [HomeController::class, 'authenticatedLogin']);

Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::get('/create-product', [HomeController::class, 'createProduct']);

Route::get('/products', [HomeController::class, 'productsAll']);

Route::post('/store', [HomeController::class, 'storeProduct']);



