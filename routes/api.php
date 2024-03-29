<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::get('/products', [ProductsController::class, 'index']);

Route::post('/register', [UsersController::class, 'register']);

Route::get('/login', [UsersController::class, 'login']);

Route::delete('/user/delete/{name}', [UsersController::class, 'deleteByName']);

Route::get('/products/search', [ProductsController::class, 'search']);

Route::get('products/{category}', [ProductsController::class, 'indexByCategory']);


