<?php

use App\Models\Door;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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


