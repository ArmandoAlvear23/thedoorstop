<?php

use App\Models\Door;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassificationController;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/contact', function() {
    return view('pages.contact');
});

Route::get('/about', function() {
    return view('pages.about');
});

// Get All Doors That Belong To Passed In Category
Route::get('/doors/{category}', [DoorController::class, 'index']);

Route::post('/doors', [DoorController::class, 'store']);

// All Messages
Route::get('/internal/messages', [MessageController::class, 'index']);

// Store Message
Route::post('/internal/messages', [MessageController::class, 'store'])->name('storeMessage');

// Single Message
Route::get('/internal/messages/{listing}', [MessageController::class, 'show']);

// Get Categories Index Page (Show all Classifications and their respective categories)
Route::get('/internal/door/categories', [CategoryController::class, 'index']);

// Get Create Category View
Route::get('/internal/door/categories/create/{classification}', [CategoryController::class, 'create'])->name('createCategory');

// Store New Category
Route::post('/internal/door/categories', [CategoryController::class, 'store'])->name('storeCategory');

// Get Edit Category View
Route::get('/internal/door/categories/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory');

// Update Category
Route::put('/internal/door/categories/{category}', [CategoryController::class, 'update'])->name('updateCategory');

// Delete Category Record
Route::delete('/internal/door/categories/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory');

// Get Create Classification View
Route::get('/internal/door/classifications/create/', [ClassificationController::class, 'create'])->name('createClassification');

// Store New Classification
Route::post('/internal/door/classifications', [ClassificationController::class, 'store'])->name('storeClassification');

