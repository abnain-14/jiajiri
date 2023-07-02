 @extends('layouts.admin_app')

 @section('content')

     @include('layouts.alerts')
     @if (count($payments) > 0)
         <section>

             <div class="row mx-auto">
                 <h5 class="mt-3 dark-grey-text font-weight-bold col-md-9 animated fadeIn">Manage Payments</h5>

             </div>
             {{-- 
             <div id="addUserModal" class="modal fade">
                 <div class="modal-dialog">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h4 class="card-title h4 mb-3"><strong><a href="" class="grey-text">CREATE
                                         FREELANCER</a></strong></h4>
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         </div>
                         <div class="modal-body">
                             <p>Please fill the fields below</p>
                             <div class="m-3">
                                 {!! Form::open(['action' => 'App\Http\Controllers\Admin\AdminFreelancersController@store', 'method' => 'POST']) !!}

                                 <div class=" m-auto">
                                     <div class="md-form form-sm">
                                         {{ Form::label('name', 'User Name') }}
                                         {{ Form::text('name', '', ['class' => 'form-control form-control', 'plcaholder' => 'User name']) }}

                                     </div>
                                 </div>

                                 <div class=" m-auto">
                                     <div class="md-form form-sm">
                                         {{ Form::label('email', 'Email') }}
                                         {{ Form::text('email', '', ['class' => 'form-control form-control', 'plcaholder' => 'Email']) }}

                                     </div>
                                 </div>

                                 <div class=" m-auto">
                                     <div class="md-form form-sm">
                                         {{ Form::label('password', 'Password') }}
                                         {{ Form::text('password', '', ['class' => 'md-textarea form-control', 'plcaholder' => 'Password']) }}

                                     </div>
                                 </div>
                                 <div class=" m-auto">

                                     {{ Form::label('role', 'Role') }}
                                     {{ Form::select('role', ['admin' => 'admin', 'consultant' => 'consultant', 'freelancer' => 'freelancer'], '', ['class' => 'mdb-select md-form']) }}


                                 </div>

                                 {{ Form::submit('Submit', ['class' => 'btn btn-sm btn-primary ml-auto']) }}
                                 {!! Form::close() !!}


                             </div>
                         </div>


                     </div>
                 </div>
             </div> --}}

             <div class="card card-cascade narrower z-depth-1">
                 <div
                     class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                     <a href="" class="white-text mx-3">Choose a payment to edit</a>
                 </div>


                 <div class="px-4 hoverable">
                     <div class="table-responsive ">
                         <table class="table table-hover mb-1 animated fadeIn">
                             <thead>
                                 <tr>

                                     <th class="th-lg"><strong>Freelancer</strong>
                                     <th class="th-lg"><strong>Consultant</strong>
                                     <th class="th-lg"><strong>Job</strong>
                                     <th class="th-lg"><strong>Amount</strong>
                                     <th class="th-lg"><strong>Account</strong>
                                     <th class="th-lg"><strong>status</strong>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($payments as $payment)
                                     @php
                                         $freelancer = \App\Models\User::where('id', $payment->freelancer_id)->first();
                                         $consultant = \App\Models\User::where('id', $payment->consultant_id)->first();
                                         $job = \App\Models\JobRequest::where('id', $payment->job_id)->first();
                                     @endphp
                                     <tr>
                                         <td>{{ $freelancer->name }}</td>
                                         <td>{{ $consultant->name }}</td>
                                         <td>{{ $job->job_title }}</td>
                                         <td>{{ $job->amount }}</td>
                                         <td>{{ $freelancer->acc_number }}</td>
                                         @if ($payment->status == 'confirmed')
                                             <td><span class="badge badge-success"><span>{{ $payment->status }}</td>
                                         @else
                                             <td><span class="badge badge-info"><span>{{ $payment->status }}</td>
                                         @endif
                                         <td>
                                         <td> <a href="#payslip{{ $payment->id }}" class="btn btn-sm btn-primary"
                                                 data-toggle="modal">
                                                 payslip
                                                 </i></a>
                                         </td>

                                     </tr>
                                     <div id="payslip{{ $payment->id }}" class="modal fade">

                                         <div class="modal-dialog">
                                             <div class="modal-content">

                                                 <div class="modal-header">
                                                     <h4 class="modal-title">Receipt </h4>
                                                     <button type="button" class="close" data-dismiss="modal"
                                                         aria-hidden="true">&times;</button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p>A consultant <strong> {{ $consultant->name }} </strong> has paid
                                                         <strong> {{ $job->amount }} </strong> in account number
                                                         <strong>{{ $freelancer->acc_number }}</strong> for you to commence
                                                         a
                                                         <strong> {{ $job->job_title }} </strong>Task. Good luck
                                                     </p> <br>


                                                     @if (is_null($payment->payslip))
                                                         <p>No Image</p>
                                                     @else
                                                         <div class="mt-3 ml-auto text-center">

                                                             <img src="/storage/payslips/{{ $payment->payslip }}"
                                                                 class="img-thumbnail" alt="Fallback Image">

                                                             <div>
                                                     @endif



                                                 </div>

                                                 @if ($payment->status != 'confirmed')
                                                     <div class="modal-footer">
                                                         <form method="POST"
                                                             action="/freelancer/apply/{{ $payment->id }}">
                                                             @csrf
                                                             @method('PUT')
                                                             <button type="submit"
                                                                 class="btn btn-sm btn-success">Grant</button>
                                                         </form>

                                                     </div>
                                                 @endif



                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>

                 </div>
             </div>
         </section>
     @else
         <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
             <div class="mx-auto">

                 <h4 class="m-4 ">No Payments</h4>

             </div>
         </div>
     @endif
 @endsection
