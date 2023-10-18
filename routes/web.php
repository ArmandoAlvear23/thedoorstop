<?php

use App\Models\Door;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $door = Door::find(1);
        $door->categories()->sync([1, 2, 3]);
        echo('attached categories!');
    return view('index');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    return view('about');
});

// Get All Doors That Belong To Passed In Category
Route::get('/doors/{category}', [DoorController::class, 'index']);

// All Messages
Route::get('/internal/messages', [MessageController::class, 'index']);

// Single Message
Route::get('/internal/messages/{listing}', [MessageController::class, 'show']);

Route::post('/doors', [DoorController::class, 'store']);
