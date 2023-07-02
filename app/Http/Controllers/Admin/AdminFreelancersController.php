<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Category;
use App\Models\JobRequest;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AdminFreelancersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

        $freelancers = User::where('role', 'freelancer')->get();

        return view('admin.freelancer')->with('freelancers', $freelancers);
    }



    public function store(Request $request)
    {
        $user = new user;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = 'freelancer';
        $user->password  = Hash::make($request->input('password'));
        $user->save();
        return redirect()->back()->with('success', 'Freelancer Added');
    }


    public function show($id)
    {
        $freelancer = User::find($id);
        $application = Applications::where('freelancer_id', $freelancer->id)->orderBy('id', 'DESC')->get();
        $categories = Category::where('user_id', $freelancer->id)->get();

        return view('admin.editfreelancer')->with('freelancer', $freelancer)->with('application', $application)->with('categories', $categories);
    }



    public function edit($id)
    {
        $freelancer = User::find($id);
        $application = Applications::where('freelancer_id', $id)->orderBy('id', 'DESC')->get();
        $categories = Category::where('user_id', $freelancer->id)->get();
        return view('admin.freelancer')->with('freelancer', $freelancer)->with('application', $application);
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
        $application = Applications::where('freelancer_id', $id)->orderBy('id', 'DESC')->get();
        foreach ($application as $application) {

            $payments = Payment::where('freelancer_id', $application->freelancer_id)->get();
            foreach ($payments as $payment) {
                $payment->delete();
            }

            $job_req = JobRequest::where('id', $application->jobrequest_id)->get();
            foreach ($job_req as $job_req) {
                $job_req->delete();
            }


            $application->delete();
        }

        $categories = Category::where('user_id', $user->id)->get();
        foreach ($categories as $category) {
            $category->delete();
        }

        $user->delete();

        return redirect()->back()->with('success', 'Freelancer Deleted');
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
