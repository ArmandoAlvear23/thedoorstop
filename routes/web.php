<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassificationController;

////////////////////////////////
// Navigation Routes
////////////////////////////////

// Get Home View
Route::get('/', function () {
    return view('pages.index');
});

//Get About View
Route::get('/about', function() {
    return view('pages.about');
});

// Get Contact View
Route::get('/contact', function() {
    return view('pages.contact');
});

////////////////////////////////
// Door Routes
////////////////////////////////

// Get All Doors View
Route::get('/doors', [DoorController::class, 'index']);

// Get Create Door View
Route::get('/internal/doors/create', [DoorController::class, 'create'])->name('createDoor');

// Store New Door
Route::post('/internal/doors', [DoorController::class, 'store'])->name('storeDoor');

// Get Edit Door View
Route::get('/internal/doors/{door}/edit', [DoorController::class, 'edit'])->name('editDoor');

// Update Door
Route::put('/internal/doors/{door}', [DoorController::class, 'update'])->name('updateDoor');

// Delete Door
Route::delete('/internal/doors/{door}', [DoorController::class, 'destroy'])->name('destroyDoor');

// Get Manage Door View
Route::get('/internal/doors/{door}/manage', [DoorController::class, 'manage'])->name('manageDoor');

// Get Show Door View
Route::get('/doors/{door}', [DoorController::class, 'show'])->name('showDoor');

////////////////////////////////
// Classification Routes
////////////////////////////////

// Get Create Classification View
Route::get('/internal/door/classifications/create/', [ClassificationController::class, 'create'])->name('createClassification');

// Store New Classification
Route::post('/internal/door/classifications', [ClassificationController::class, 'store'])->name('storeClassification');

// Get Edit Classification View
Route::get('/internal/door/classifications/{classification}/edit', [ClassificationController::class, 'edit'])->name('editClassification');

// Update Classification
Route::put('/internal/door/classifications/{classification}', [ClassificationController::class, 'update'])->name('updateClassification');

// Delete Classification
Route::delete('/internal/door/classifications/{classification}', [ClassificationController::class, 'destroy'])->name('destroyClassification');


////////////////////////////////
// Category Routes
////////////////////////////////

// Get All Categories View
Route::get('/internal/door/categories', [CategoryController::class, 'index']);

// Get Create Category View
Route::get('/internal/door/categories/create/{classification}', [CategoryController::class, 'create'])->name('createCategory');

// Store New Category
Route::post('/internal/door/categories', [CategoryController::class, 'store'])->name('storeCategory');

// Get Edit Category View
Route::get('/internal/door/categories/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory');

// Update Category
Route::put('/internal/door/categories/{category}', [CategoryController::class, 'update'])->name('updateCategory');

// Delete Category
Route::delete('/internal/door/categories/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory');

////////////////////////////////
// Message Routes
////////////////////////////////

// Get All Messages View
Route::get('/internal/messages', [MessageController::class, 'index']);

// Store New Message
Route::post('/internal/messages', [MessageController::class, 'store'])->name('storeMessage');

// Get Show Message View
Route::get('/internal/messages/{listing}', [MessageController::class, 'show'])->name('showMessage');

////////////////////////////////
// User Routes
////////////////////////////////

// Show Register/Create Form
Route::get('/internal/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('registerUser');

// Show Login Form
Route::get('/internal/login', [UserController::class, 'login'])->name('loginUser')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticateUser');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser')->middleware('auth');