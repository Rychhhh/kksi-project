<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCourse;
use App\Models\Course;
use App\Models\Materi;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCourse $request)
    {
        try {
            $validated = $request->validated(); // validasi request

            // Insert data in database
            Course::create([
                'title' => $validated['title'],
            ]);

            return response()->json([
                'message' => 'Berhasil tambah pelajaran',
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // edit data
        $data = Course::findOrFail($id);
        return view('dashboard.courses.edit')->with([
            "data" => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCourse $request, $id)
    {
        try {
            $validated = $request->validated();
            // menyimpan data edit
            $data = Course::findOrFail($id);
            $data->title = $validated['title'];
            $data->save();
            return response()->json([
                'message' => 'Berhasil edit pelajaran'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data
        $data = Course::find($id);
        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
