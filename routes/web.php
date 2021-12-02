<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\route\RouteController;
use App\Models\Materi;
use Illuminate\Support\Facades\Route;

//free access
Route::get('/dashboard', function () {
   return view('dashboard.index');
});
Route::get('/materi', [RouteController::class, 'dataMateri']);

Route::middleware('guest')->group(function () {
   // Tampilan awal user
   Route::get('/', function () {
      return view('auth.login');
   });
   // Login 
   Route::get('/login', [AuthController::class, 'loginView']);
   // Menyimpan data
   Route::post('/login', [AuthController::class, 'authenticate']);
   // Register
   Route::get('/register', [AuthController::class, 'registerView']);
   Route::post('/register', [AuthController::class, 'registerStore']);
});

Route::middleware('auth')->group(function () {
   Route::group([['middleware' => 'admin'], ['middleware' => 'teacher']], function () {
      // Course Page
      Route::get('/course', [RouteController::class, 'dataCourse']);
      // Create Course
      Route::get('/course/create', [CourseController::class, 'create']);
      Route::get('/course/store', [CourseController::class, 'store']);
      // Edit courses
      Route::get('/course/show/{id}', [CourseController::class, 'show']);
      Route::get('/course/update/{id}', [CourseController::class, 'update']);
      // Delete Course
      Route::get('/course/destroy/{id}', [CourseController::class, 'destroy']);

      // Resource materi
      Route::resource('/detail/{course:id}/materi', MateriController::class);
   });

   Route::prefix('admin')->middleware('admin')->group(function () {
      Route::view('dashboard', 'layouts.admin.adminmain');
   });

   Route::get('/logout', [AuthController::class, 'logout']);
   // Route::get('/materi/destroy/{id}', [CourseController::class, 'destroy']);
   // Route::post('/detail/{course:id}/materi/{materi:id}', [MateriController::class, 'destroy']);
});
