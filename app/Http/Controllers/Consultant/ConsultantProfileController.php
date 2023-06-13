<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConsultantProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('consultant');
    }


    public function index()
    {

        $user_id = Auth::user()->id;
        $jobrequest = JobRequest::where('user_id', $user_id)->get();
        return view('consultant.profile')->with('jobrequest', $jobrequest);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'profile_pic' => 'image|nullable|max:1999'
        ]);


        $user = User::find($id);

        if ($request->file('profile_pic')) {

            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('profile_pic')->storeAs('public/profile_pics', $fileNameToStore);
            $user->profile_pic = $fileNameToStore;
        } else {
            $user->profile_pic = $user->profile_pic;
        }



        if ($request->input('username')) {
            $user->name = $request->input('username');
        } else {
            $user->name = $user->name;
        }

        if ($request->input('email')) {
            $user->email = $request->input('email');
        } else {
            $user->email = $user->email;
        }

        if ($request->input('phone')) {
            $user->phone = $request->input('phone');
        } else {
            $user->phone = $user->phone;
        }

        $user->save();
        return redirect()->back()->with('success', 'Prifile Edited');
    }
}
