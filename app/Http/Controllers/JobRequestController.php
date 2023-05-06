<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use Illuminate\Http\Request;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobrequest = JobRequest::all();
        return view('jobrequest.index')->with('jobrequest', $jobrequest);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $input = $request->all();
            JobRequest::create($input);
            return redirect('/consultant/jobrequest')->with('flash_message', 'Job Request Added!');  
        }
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobrequest = JobRequest::find($id);
        return view('jobrequest.show')->with('jobrequest', $jobrequest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $jobrequest = JobRequest::find($id);
        return view('jobrequest.edit')->with('jobrequest', $jobrequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobrequest = JobRequest::find($id);
        $input = $request->all();
        $jobrequest->update($input);
        return redirect('/consultant/jobrequest')->with('flash_message', 'job request Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JobRequest::destroy($id);
        return redirect('/consultant/jobrequest')->with('flash_message', 'jobrequest deleted!');  
    }
}
