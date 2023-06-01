<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\JobRequest;

class FreelancerController extends Controller
{

    public function __construct()
    { 
        $this->middleware('freelancer');
    }


    public function index()
    {
      
        $jobs = JobRequest::orderBy('created_at', 'desc')->paginate(3);
        return view('freelancer.home')->with('jobs', $jobs);
    }

    public function show($id){
        $job = JobRequest::find($id);
        return view('freelancer.viewjob')->with('job', $job);
    }
}
