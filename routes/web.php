<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers;
use App\Http\Models;

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

// Route::get('/category/create', [CategoryController::class, 'create']);
Route::resource('category', 'App\Http\Controllers\CategoryController')->middleware('auth');

Route::resource('food', 'App\Http\Controllers\FoodController')->middleware('auth');

Auth::routes(['register=>false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
