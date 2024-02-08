<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ===> Manage route
Route::group(['prefix' => 'v1'], function () {
    require(__DIR__ . '/api/main.php');
});

Route::get('/v1/product/', [ProductController::class, 'getAll']);
Route::get('/v1/product/{id}', [ProductController::class, 'getById']);

Route::get('/v1/brand/', [BrandController::class, 'getAll']);
Route::get('/v1/brand/{id}', [BrandController::class, 'getById']);