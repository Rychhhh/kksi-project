<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImgUpdateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataUserController extends Controller
{
    public function update(Request $request)
    {
        try {
            $data = UserCredential::where('user_id', $request->id)->first();

            $data->update([
                'description' => $request->desc,
                'gender' => $request->gender,
                'academy' => $request->academy,
                'mobile' => $request->phone,
                'location' => $request->location,
                'fb_acc' => $request->fb,
                'ig_acc' => $request->ig,
                'twit_acc' => $request->twit,
                'git_acc' => $request->git,
            ]);
            
            return redirect('profile');
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }

    public function imgUpdate(ImgUpdateUserRequest $img)
    {
        try {
            if ($img->files) {
                $fileName = Auth::user()->id . Auth::user()->name . '.' . $img->file('pict')->extension();
                $img->file('pict')->storeAs('public/user', $fileName);
                $pict = 'storage/user/' . $fileName;

                $data = User::where('id', Auth::user()->id)->where('email', Auth::user()->email)->first();
                $done = $data->update([
                    'pict' => $pict,
                ]);
                return response()->json([
                    'message' => 'Profile Picture telah diganti'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Error ' . $th->getMessage()
            ]);
        }
    }
}
