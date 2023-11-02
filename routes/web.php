<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\PageController;

////////////////////////////////
// Navigation Routes
////////////////////////////////

// Get Home View
Route::get('/', [PageController::class, 'index']);

//Get About View
Route::get('/about', function() {
    return view('pages.about');
})->name('about');

// Get Contact View
Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');

////////////////////////////////
// Door Routes
////////////////////////////////

// Get All Doors View
Route::get('/doors', [DoorController::class, 'index'])->name('indexDoor');

// Get Create Door View
Route::get('/internal/doors/create', [DoorController::class, 'create'])->name('createDoor')->middleware('auth');

// Store New Door
Route::post('/internal/doors', [DoorController::class, 'store'])->name('storeDoor')->middleware('auth');

// Get Edit Door View
Route::get('/internal/doors/{door}/edit', [DoorController::class, 'edit'])->name('editDoor')->middleware('auth');

// Update Door
Route::put('/internal/doors/{door}', [DoorController::class, 'update'])->name('updateDoor')->middleware('auth');

// Delete Door
Route::delete('/internal/doors/{door}', [DoorController::class, 'destroy'])->name('destroyDoor')->middleware('auth');

// Get Show Door View
Route::get('/doors/{door}', [DoorController::class, 'show'])->name('showDoor');

////////////////////////////////
// Classification Routes
////////////////////////////////

// Get Create Classification View
Route::get('/internal/door/classifications/create/', [ClassificationController::class, 'create'])->name('createClassification')->middleware('auth');

// Store New Classification
Route::post('/internal/door/classifications', [ClassificationController::class, 'store'])->name('storeClassification')->middleware('auth');

// Get Edit Classification View
Route::get('/internal/door/classifications/{classification}/edit', [ClassificationController::class, 'edit'])->name('editClassification')->middleware('auth');

// Update Classification
Route::put('/internal/door/classifications/{classification}', [ClassificationController::class, 'update'])->name('updateClassification')->middleware('auth');

// Delete Classification
Route::delete('/internal/door/classifications/{classification}', [ClassificationController::class, 'destroy'])->name('destroyClassification')->middleware('auth');

////////////////////////////////
// Category Routes
////////////////////////////////

// Get All Categories View
Route::get('/internal/door/categories', [CategoryController::class, 'index'])->name('indexCategory')->middleware('auth');

// Get Create Category View
Route::get('/internal/door/categories/create/{classification}', [CategoryController::class, 'create'])->name('createCategory')->middleware('auth');

// Store New Category
Route::post('/internal/door/categories', [CategoryController::class, 'store'])->name('storeCategory')->middleware('auth');

// Get Edit Category View
Route::get('/internal/door/categories/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory')->middleware('auth');

// Update Category
Route::put('/internal/door/categories/{category}', [CategoryController::class, 'update'])->name('updateCategory')->middleware('auth');

// Delete Category
Route::delete('/internal/door/categories/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory')->middleware('auth');

////////////////////////////////
// Message Routes
////////////////////////////////

// Get All Messages View
Route::get('/internal/messages', [MessageController::class, 'index'])->name('indexMessage')->middleware('auth');

// Store New Message
Route::post('/internal/messages', [MessageController::class, 'store'])->name('storeMessage')->middleware('auth');

////////////////////////////////
// User Routes
////////////////////////////////

// Show Register/Create Form
Route::get('/internal/register', [UserController::class, 'create'])->name('createUser')->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('registerUser');

// Show Login Form
Route::get('/internal/login', [UserController::class, 'login'])->name('loginUser')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticateUser');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser')->middleware('auth');