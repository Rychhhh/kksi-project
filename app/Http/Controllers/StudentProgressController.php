<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestProgress;
use App\Models\Course;
use App\Models\Materi;
use App\Models\StudentDone;
use App\Models\StudentProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class StudentProgressController extends Controller
{
    public function store(StoreRequestProgress $request)
    {
        try {
            if (Auth::user()->role == 'siswa') {
                $validated = $request->validated();

                $user_id = Auth::user()->id;
                $done = StudentProgress::create([
                    'user_id' => $user_id,
                    'course_id' => $validated['course_id'],
                    'material_id' => $validated['materi_id'],
                ]);

                if ($done) {

                    $check = StudentDone::where('user_id', $user_id)->where('course_id', $validated['course_id'])->get('progress')->count();

                    if ($check < 1) {
                        $progress = StudentProgress::where('user_id', $user_id)->where('course_id', $validated['course_id'])->where('status', 'like', '%Done%')->get('status');
                        $course = Course::where('id', $validated['course_id'])->get('total_materi');

                        foreach ($course as $value) {
                            $status = $progress->count();
                            $v = $value['total_materi'];
                            $val = ($status / $v) * 100;

                            StudentDone::create([
                                'user_id' => $user_id,
                                'course_id' => $validated['course_id'],
                                'progress' => round($val)
                            ]);

                        return response()->json([
                            'message' => 'Progress siswa telah di store',
                        ]);
                        }
                    }

                    return response()->json([
                        'message' => 'Belum ada yg bisa ditambahkan'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }

    public function update($materi_id)
    {
        try {
            if (Auth::user()->role == 'siswa') {
                $user_id = Auth::user()->id;
                $data = StudentProgress::all()->where('user_id', $user_id)->where('material_id', $materi_id)->first();

                $done = $data->update(['status' => 'Done']);

                if ($done) {
                    $course_id = Materi::where('id', $materi_id)->get('course_id');

                    foreach ($course_id as $id) {
                        $progress = StudentProgress::where('user_id', $user_id)->where('course_id', $id['course_id'])->where('status', 'like', '%Done%')->get('status');
                        $course = Course::where('id', $id['course_id'])->get('total_materi');

                        foreach ($course as $value) {
                            $status = $progress->count();
                            $v = $value['total_materi'];
                            $val = ($status / $v) * 100;

                            $up = StudentDone::where('user_id', $user_id)->where('course_id', $id['course_id'])->first();

                            $up->update([
                                'progress' => round($val)
                            ]);

                            return response()->json([
                                'message' => 'Progress siswa telah di update',
                            ]);
                        }
                    }

                }
            }
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }
}
