<?php

// Admin
use App\Http\Controllers\admin\AdminController as AdminAdminController;
use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\admin\SiswaController;

// Auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegistrationController;
// Course, Materi
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MateriController;

// Route
use App\Http\Controllers\route\RouteController;

use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\SumCourseController;
use App\Http\Controllers\DataUserController;
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
   // Register
   Route::get('/register', [RegistrationController::class, 'index']);
   Route::post('/register', [RegistrationController::class, 'store']);
   // Login 
   Route::get('/login', [LoginController::class, 'index']);
   // Menyimpan data
   Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
   //Profile page
   Route::get('profile', [RouteController::class, 'dataUser']);
   Route::post('profile/update/{id}', [DataUserController::class, 'update']);
   Route::post('profile/img/update/{id}', [DataUserController::class, 'imgUpdate']);

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

      // Update Total Course
      Route::get('/course/total/{id}', SumCourseController::class);

      // Resource materi
      Route::resource('/detail/{course:id}/materi', MateriController::class);

      Route::post('progress/store', [StudentProgressController::class, 'store']);
      Route::post('progress/update/{id}', [StudentProgressController::class, 'update']);
   });
   
   
   Route::prefix('admin')->middleware('admin')->group(function () {
      Route::view('dashboard', 'admin.dashboard');
   });

   Route::get('coba', [RouteController::class, 'firstviewAdmin']);

   Route::resource('admin', AdminAdminController::class);
   Route::resource('siswa', SiswaController::class);
   Route::resource('guru', GuruController::class);

   Route::get('/logout', [LogoutController::class, 'logout']);

   // Route::get('/materi/destroy/{id}', [CourseController::class, 'destroy']);
   // Route::post('/detail/{course:id}/materi/{materi:id}', [MateriController::class, 'destroy']);
});