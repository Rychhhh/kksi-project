<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Materi;
use Illuminate\Http\Request;

class SumCourseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        try {
            $data = Materi::all()->where('course_id', $id);
        
            if (!empty($data)) {
                $sum =  $data->count('course_id');
    
                Course::where('id', $id)
                    ->update([
                    'total_materi' => $sum
                ]);
            }
            return redirect('/materi');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
