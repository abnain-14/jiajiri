<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FreelancerProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('freelancer');
    }


    public function index()
    {

        $user_id = Auth::user()->id;
        // $jobrequest = JobRequest::where('user_id', $user_id)->get();
        return view('freelancer.profile');
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

        if ($request->input('acc_num')) {
            $user->acc_number = $request->input('acc_num');
        } else {
            $user->acc_number = $user->acc_number;
        }

        $user->save();
        return redirect()->back()->with('success', 'Prifile Edited');
    }


    public function cvupload(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->file('cv')) {

            $fileNameWithExt = $request->file('cv')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cv')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('cv')->storeAs('public/cv', $fileNameToStore);
            $user->cv = $fileNameToStore;
            $user->save();
        }

        return redirect()->back()->with('success', 'CV Uploaded');
    }
}
