<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'listProducts']);
    Route::get('/{id}', [ProductController::class, 'getProduct']);
    Route::post('/', [ProductController::class, 'createProduct']);
    Route::put('/{id}', [ProductController::class, 'updateProduct']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'users']);
    Route::get('/{id}', [UserController::class, 'getUser']);
    Route::post('/', [UserController::class, 'createUser']);
    Route::put('/{id}', [UserController::class, 'updateUser']);
    Route::delete('/{id}', [UserController::class, 'destroyUser']);
});
