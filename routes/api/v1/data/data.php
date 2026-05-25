<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

#api/v1/product/
Route::apiResource('product', ProductController::class, ['parameters' => ['product' => 'product']]);
// Route::apiResource('product', ProductController::class, ['parameters' => ['product' => 'product']]);
