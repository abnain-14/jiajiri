<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Applications;
use App\Models\JobRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class ApplicationsConsultantController extends Controller
{

    public function __construct()
    {
        $this->middleware('consultant');
    }


    public function index()
    {
        $applications = Applications::where('consultant_id', Auth::user()->id)->get();
        return view('consultant.jobrequest.viewapps')->with('applications', $applications);
    }

    public function show($id)
    {
        $application = Applications::where('id', $id)->first();
        return view('consultant.jobrequest.judgeapps')->with('application', $application);
    }


    public function update(Request $request, $id)
    {


        $application = Applications::find($id);
        $job = JobRequest::where('id', $application->jobrequest_id)->first();
        $payment = new Payment;

        $payment->freelancer_id    = $application->freelancer_id;
        $payment->consultant_id    = $application->consultant_id;
        $payment->job_id = $application->jobrequest_id;
        $payment->amount = $job->amount;



        $exist = Payment::where('job_id', $application->jobrequest_id)->where('freelancer_id', $application->freelancer_id)->first();

        if ($request->input('num') == '0') {
            if ($exist) {
                $exist->delete();
                $application->status = "rejected";
            } else {
                $application->status = "rejected";
            }
        } else if ($request->input('num') == '1') {

            if ($exist) {
                return redirect('consultant/apply')->with('error', 'Cant apply twice');
            } else {
                $payment->save();
                $application->status = "accepted";
            }
        }


        $application->save();





        return redirect('consultant/apply')->with('success', 'Reviewed');
    }
    public function upload(Request $request, $id)
    {

        $payments = Payment::find($id);

        if ($request->file('payslip')) {

            $fileNameWithExt = $request->file('payslip')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('payslip')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('payslip')->storeAs('public/payslips', $fileNameToStore);
            $payments->payslip = $fileNameToStore;
            $payments->save();
        }

        return redirect()->back()->with('success', 'Receipt Uploaded');
    }
}
