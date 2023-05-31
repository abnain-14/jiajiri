<?php

namespace App\Http\Controllers\Consultant;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConsultantController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('consultant');
    }


    public function index()
    {
        return view('consultant.home');
    }
}
