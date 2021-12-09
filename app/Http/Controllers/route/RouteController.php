<?php

namespace App\Http\Controllers\route;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class RouteController extends Controller
{
    public function dataUser() //halaman profile user
    {
      try {
          $users = User::where('email', Auth::user()->email)->get();
          return view('dashboard.profile.index', compact('users'));
      } catch (\Throwable $th) {
          throw $th;
      }
    }

    public function dataMateri() // halaman data materi
    {
        try {
            $courses = Course::all()->sortByDesc('created_at');
            return view('dashboard.materis.index', compact('courses'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function dataCourse() // halaman data course (mata pelajaran)
    {
        try {
            $data = Course::all()->sortByDesc('id');
            return view('dashboard.courses.index')->with([
                "data" => $data
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function firstviewAdmin() {
        return view('admin.user.index');
    }
  
}
