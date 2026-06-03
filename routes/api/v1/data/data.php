<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DosageFormController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

#api/v1/product/
Route::apiResource('product', ProductController::class, ['parameters' => ['product' => 'product']]);
Route::apiResource('category', CategoryController::class, ['parameters' => ['category' => 'category']]);
Route::apiResource('dosage-form', DosageFormController::class, ['parameters' => ['dosage-form' => 'dosage-form']]);
Route::get('city', [CityController::class, 'index']);
Route::get('district', [DistrictController::class, 'index']);
Route::get('commune', [CommuneController::class, 'index']);
Route::get('village', [VillageController::class, 'index']);
Route::apiResource('facility', FacilityController::class, ['parameters' => ['facility' => 'facility']]);
