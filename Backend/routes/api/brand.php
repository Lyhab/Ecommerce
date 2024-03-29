<?php
//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Project

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'getAll'])->middleware('authorization:1,2');
    Route::get('/{id}', [BrandController::class, 'getById'])->middleware('authorization:1,2');
    Route::post('/', [BrandController::class, 'create'])->middleware('authorization:1');
    Route::patch('/{id}', [BrandController::class, 'update'])->middleware('authorization:1');
    Route::delete('/{id}', [BrandController::class, 'delete'])->middleware('authorization:1');
});