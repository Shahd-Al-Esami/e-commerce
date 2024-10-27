<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);



// Define API routes for categories
Route::get('/', [CategoryController::class, 'index']);       // Get all categories

Route::middleware('auth:sanctum')->prefix('categories')->group(function () {
    Route::post('/', [CategoryController::class, 'store']);      // Create a new category
    Route::get('/{category}', [CategoryController::class, 'show']); // Get a specific category
    Route::put('/{category}', [CategoryController::class, 'update']); // Update a specific category
    Route::delete('/{category}', [CategoryController::class, 'destroy']); // Delete a specific category
});

// Define API routes for products
Route::get('/', [ProductController::class, 'index']);      // Get all products

Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get('/trashed', [ProductController::class, 'showDeletedItems']); // Show trashed products

    Route::post('/', [ProductController::class, 'store']);     // Create a new product
    Route::get('/{product}', [ProductController::class, 'show']); // Get a specific product
    Route::put('/{product}', [ProductController::class, 'update']); // Update a specific product
    Route::delete('/{product}', [ProductController::class, 'destroy']);  // Delete a specific product

    Route::post('/restore/{id}', [ProductController::class, 'restore']); // Restore a deleted product
    Route::delete('/force-delete/{id}', [ProductController::class, 'forceDelete']); // Permanently delete a product
});


// Define API routes for orders

Route::middleware('auth:sanctum')->prefix('orders')->group(function () {
    Route::get('/sales', [OrderController::class, 'getSales']);// Get completed sales

    Route::get('/', [OrderController::class, 'index']);               // Get all orders
    Route::post('/{id}', [OrderController::class, 'store']);          // Create a new order
    Route::get('/{order}', [OrderController::class, 'show']);         // Get a specific order
    Route::put('/{order}', [OrderController::class, 'update']);       // Update a specific order
    Route::delete('/{order}', [OrderController::class, 'destroy']);   // Delete a specific order

    Route::post('/pay/{order}', [OrderController::class, 'pay']);        // Pay for an order
    Route::get('/user-orders', [OrderController::class, 'userOrders']); // Get user orders
    
});
