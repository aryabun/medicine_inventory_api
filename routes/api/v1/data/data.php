<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DosageFormController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

#api/v1/product/
Route::apiResource('product', ProductController::class, ['parameters' => ['product' => 'product']]);
Route::apiResource('category', CategoryController::class, ['parameters' => ['category' => 'category']]);
Route::apiResource('dosage-form', DosageFormController::class, ['parameters' => ['dosage-form' => 'dosage-form']]);
