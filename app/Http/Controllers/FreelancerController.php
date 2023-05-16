<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobRequest;

class FreelancerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('freelancer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $jobs = JobRequest::orderBy('created_at', 'desc')->get();
        return view('freelancerHome')->with('jobs', $jobs);
    }

    public function show($id){
        $jobs = JobRequest::where('id', $id)->get();
        return view('freelancer.viewjob')->with('jobs', $jobs);
    }
}
