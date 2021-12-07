<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tampilan awal admin
        // disini ditanyakan akan masuk view siswa atau guru
        $Alladmin = User::where('role', 'admin')->get();
        return view('admin.user.Admin.index', compact('Alladmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // untuk mengedit data
        $updateAdmin = User::find($id);

        return view('admin.user.Admin.edit', compact('updateAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // untuk menyimpan data edit
        $updateAdmin = User::find($id);
        $updateAdmin->name = $request->name;
        $updateAdmin->role = $request->role;
        $updateAdmin->email = $request->email;

        $updateAdmin->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // untuk menghapus data
        $deleteAdmin = User::find($id);
        $deleteAdmin->delete();
        
        return redirect('admin')->with('success', 'Data Berhasil Dihapus');
    }
}
