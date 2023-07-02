<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\JobRequest;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AdminConsultantsController
extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {


        $consultants = User::where('role', 'consultant')->get();
        return view('admin.consultant')->with('consultants', $consultants);
    }



    public function store(Request $request)
    {
        $user = new user;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = 'consultant';
        $user->password  = Hash::make($request->input('password'));
        $user->save();
        return redirect()->back()->with('success', 'Consultant Added');
    }


    public function show($id)
    {
        $consultant = User::find($id);
        $jobs_req = JobRequest::where('user_id', $consultant->id)->orderBy('id', 'DESC')->get();

        return view('admin.editconsultant')->with('consultant', $consultant)->with('jobs_req', $jobs_req);
    }



    public function edit($id)
    {
        $consultant = User::find($id);
        $jobs_req = JobRequest::where('user_id', $consultant->user_id)->orderBy('id', 'DESC')->get();

        return view('admin.editconsultant')->with('consultant', $consultant)->with('jobs_req', $jobs_req);
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

        if ($request->input('role')) {
            $user->role = $request->input('role');
        } else {
            $user->role = $user->role;
        }


        $user->save();
        return redirect()->back()->with('success', 'Profile Edited');
    }



    public function destroy($id)
    {
        $user = User::find($id);
        $jobs_req = JobRequest::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        foreach ($jobs_req as $jobs_req) {

            $payments = Payment::where('job_id', $jobs_req->id)->get();
            foreach ($payments as $payment) {
                $payment->delete();
            }

            $applications = Applications::where('jobrequest_id', $jobs_req->id)->get();
            foreach ($applications as $application) {
                $application->delete();
            }


            $jobs_req->delete();
        }


        $user->delete();

        return redirect()->back()->with('success', 'Consultant Deleted');
    }
}
