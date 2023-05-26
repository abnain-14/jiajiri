<?php

namespace App\Http\Controllers;

use App\Models\FreeProfile;
use Illuminate\Http\Request;

class FreeProfileController extends Controller
{
    //
    public function index()
    {
        $freeprofile = FreeProfile::all();
        return view('freeprofile.freeindex')->with('freeprofile', $freeprofile);
    }

    public function create()
    {
        return view('freeprofile.create');
    }
    public function store(Request $request)
    {
        {
            $input = $request->all();
            FreeProfile::create($input);
            return redirect('/freelancer/profile')->with('flash_message', 'profile edited');  
        }
    }
    public function show(string $id)
    {
        $freeprofile = FreeProfile::find($id);
        return view('freelancer/profile')->with('freeprofile', $freeprofile);
    }

}
