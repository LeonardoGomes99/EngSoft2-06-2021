<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::post('/authenticatedLogin', [HomeController::class, 'authenticatedLogin']);

Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/create-product', [ProductsController::class, 'createProduct']);

Route::get('/products', [ProductsController::class, 'productsAll']);

Route::post('/store', [ProductsController::class, 'storeProduct']);

Route::get('/create-employee', [UserController::class, 'index']);

Route::post('/store-user',[UserController::class, 'storeUser']);

Route::get('/edit/{id}', [ProductsController::class, 'edit']);

Route::post('/edit/{id}/update', [ProductsController::class, 'editStore']);


Route::post('/delete', [ProductsController::class, 'removeProduct']);




