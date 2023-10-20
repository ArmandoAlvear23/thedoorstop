<?php

use App\Models\Door;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;

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

// Single Message
Route::get('/internal/messages/{listing}', [MessageController::class, 'show']);

// Get Categories Index Page (Show all Classifications and their respective categories)
Route::get('/internal/door/categories', [CategoryController::class, 'index']);

Route::get('/internal/door/categories/create/{classification}', [CategoryController::class, 'create'])->name('create_category');


