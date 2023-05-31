<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JobRequest;
use Illuminate\Http\Request;

class JobRequestController extends Controller
{

    public function index()
    {
        $jobrequest = JobRequest::where('user_id', Auth::user()->id)->get();
        return view('consultant.jobrequest.index')->with('jobrequest', $jobrequest);
    }


    public function create()
    {
        return view('consultant.jobrequest.create');
    }


    public function store(Request $request)
    { {

            $jobrequest =  new JobRequest;
            $jobrequest->user_id = Auth::user()->id;
            $jobrequest->job_title = $request->input('job_title');
            $jobrequest->amount = $request->input('amount');
            $jobrequest->job_description = $request->input('job_description');
            $jobrequest->job_qualification = $request->input('job_qualification');
    
            $jobrequest->save();
            return redirect('/consultant/jobrequest')->with('flash_message', 'Job Request Added!');
        }
    }


    public function show($id)
    {
        $jobrequest = JobRequest::find($id);
        return view('consultant.jobrequest.show')->with('jobrequest', $jobrequest);
    }


    public function edit($id)
    {

        $jobrequest = JobRequest::find($id);
        return view('consultant.jobrequest.edit')->with('jobrequest', $jobrequest);
    }


    public function update(Request $request, string $id)
    {
        $jobrequest = JobRequest::find($id);
        $jobrequest->user_id = Auth::user()->id;
        $jobrequest->job_title = $request->input('job_title');
        $jobrequest->amount = $request->input('amount');
        $jobrequest->job_description = $request->input('job_description');
        $jobrequest->job_qualification = $request->input('job_qualification');

        $jobrequest->save();
        return redirect('/consultant/jobrequest')->with('flash_message', 'job request Updated!');
    }


    public function destroy(string $id)
    {
        JobRequest::destroy($id);
        return redirect('/consultant/jobrequest')->with('flash_message', 'jobrequest deleted!');
    }
}
