<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use App\Models\User;
use App\Models\Applications;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationsFreelancerController extends Controller
{

    public function __construct()
    {
        $this->middleware('freelancer');
    }

    public function show($id){
        $payments = Payment::where('freelancer_id', Auth::user()->id)->get();
        return view('freelancer.payments')->with('payments', $payments);
    }
 


    public function edit($id)
    {
        $job = JobRequest::find($id);
        $application = new Applications;
        $application->freelancer_id = Auth::user()->id;
        $application->jobrequest_id = $job->id;
        $application->consultant_id = $job->user_id;
        $application->save();

        return redirect()->back()->with('success', 'Job Applied');
    }

    public function update($id){
        $payment = Payment::find($id);
        $payment->status = "confirmed";
        $payment->save();
        return redirect()->back()->with('success', 'Payment Reviewed');
    }


}
