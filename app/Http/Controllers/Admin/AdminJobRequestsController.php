<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JobRequest;
use Illuminate\Http\Request;

class AdminJobRequestsController extends Controller
{



    public function edit($id)
    {
        $jobrequest = JobRequest::find($id);
        return view('admin.editjobrequest')->with('jobrequest', $jobrequest);
    }


    public function update(Request $request, string $id)
    {
        $jobrequest = JobRequest::find($id);
        $jobrequest->job_title = $request->input('job_title');
        $jobrequest->amount = $request->input('amount');
        $jobrequest->job_description = $request->input('job_description');
        $jobrequest->job_qualification = $request->input('job_qualification');

        $jobrequest->save();
        return redirect('/manage_consultants/'.$jobrequest->user_id)->with('success', 'Job request Updated');
    }


    public function destroy(string $id)
    {
        JobRequest::destroy($id);
        return redirect()->back()->with('success', 'Jobrequest Deleted');
    }
}
