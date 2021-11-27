<?php

namespace App\Http\Controllers\route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class RouteController extends Controller
{
    public function dataMateri()
    {
        try {
            return view('');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
