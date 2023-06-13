<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('consultant');
    }


    public function index()
    {
        $payments = Payment::where('consultant_id', Auth::user()->id)->get();
        return view('consultant.payments')->with('payments', $payments);
    }
}
