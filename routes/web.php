<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\route\RouteController;
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



// Login 
Route::get('/login', [LoginController::class, 'index']);

// Menyimpan data
Route::post('/login', [LoginController::class, 'authenticate']);

// Register
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function(){
    Route::get('/materi', [RouteController::class, 'dataMateri']);
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});
