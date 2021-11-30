<?php

namespace App\Http\Controllers\route;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Materi;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class RouteController extends Controller
{
    public function dataMateri()
    {
        try {
            $courses = Course::all()->sortByDesc('created_at');
            return view('dashboard.materis.index', compact('courses'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

  
}
