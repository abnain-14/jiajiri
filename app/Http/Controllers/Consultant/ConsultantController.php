<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Category;

class ConsultantController extends Controller
{

    public function __construct()
    {
        $this->middleware('consultant');
    }


    public function index()
    {
        $category = Category::paginate(4);
        return view('consultant.home')->with('category', $category);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('consultant.viewlancer')->with('category', $category);
    }
}
