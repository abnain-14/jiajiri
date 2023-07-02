<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;




class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

       
        $consultants = User::where('role', 'consulrant')->get();
        $freelancers = User::where('role', 'freelancer')->get();

        return view('admin.index')->with('consultants', $consultants)->with('freelancers', $freelancers);
    }


    public function show(){
        
    }


}
