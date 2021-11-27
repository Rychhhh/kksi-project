<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Tampilan awal user
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.main');
});

// Login 
Route::get('/login', [LoginController::class, 'index']);

// Menyimpan data
Route::post('/login', [LoginController::class, 'authenticate']);

// Register
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

