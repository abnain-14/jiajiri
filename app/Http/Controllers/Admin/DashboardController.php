<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;




class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

       
        $consultants = User::where('role', 'consultant')->get();
        $freelancers = User::where('role', 'freelancer')->get();
        $payments = Payment::all();
        

        return view('admin.index')->with('consultants', $consultants)->with('freelancers', $freelancers)->with('payments',$payments);
    }


    public function show(){
        
    }


}
