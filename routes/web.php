<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

use App\Http\Controllers\Auth\LoginController;
///賞味期限管理/app/Http/Controllers/LoginController.php

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
    return view('welcome');
});

Route::get('/foods', [FoodController::class, 'index'])->name('index');
Route::get('/foods/add', [FoodController::class, 'add'])->name('add');
Route::post('/foods', [FoodController::class, 'store']);
Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('edit');
Route::put('/foods/{food}', [FoodController::class, 'update']);
Route::delete('/foods/{food}', [FoodController::class,'delete']);

Route::get('/search/{food_name}', [FoodController::class, 'search'])->name('search');
//Route::get('/search2', [FoodController::class, 'search2'])->name('search2');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login/google', [LoginController::class, 'redirectToGoogle']); 
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
