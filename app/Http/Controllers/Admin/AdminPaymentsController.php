<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Payment;
use Illuminate\Http\Request;


class AdminPaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments')->with('payments', $payments);
    }




}
