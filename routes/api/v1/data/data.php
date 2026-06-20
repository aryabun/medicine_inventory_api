<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DosageFormController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

#api/v1/product/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('product', ProductController::class, ['parameters' => ['product' => 'product']]);
    Route::apiResource('category', CategoryController::class, ['parameters' => ['category' => 'category']]);
    Route::apiResource('facility', FacilityController::class, ['parameters' => ['facility' => 'facility']]);
    Route::apiResource('dosage-form', DosageFormController::class, ['parameters' => ['dosage-form' => 'dosage-form']]);
    Route::get('/stock', [InventoryController::class, 'index']);
    Route::post('/stock/in', [InventoryController::class, 'stockIn']);
    Route::post('/stock/out', [InventoryController::class, 'stockOut']);
    Route::get('/stock/transaction', [StockTransactionController::class, 'index']);
});
Route::get('role', [RoleController::class, 'index']);
Route::get('permission', [PermissionController::class, 'index']);
Route::get('user', [UserController::class, 'index']);
Route::get('city', [CityController::class, 'index']);
Route::get('district', [DistrictController::class, 'index']);
Route::get('commune', [CommuneController::class, 'index']);
Route::get('village', [VillageController::class, 'index']);
