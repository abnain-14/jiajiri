 @extends('layouts.admin_app')

 @section('content')

     <div class="m-5 mx-auto pt-3 ">
         @include('layouts.alerts')
         <section class="pb-5">
             <div class="mb-5">
                 <div class="">
                     <div class="">

                         <ul class="nav md-tabs nav-justified grey lighten-3 mx-0" role="tablist">

                             <li class="nav-item">

                                 <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel1"
                                     role="tab"> Profile</a>
                             </li>


                             <li class="nav-item">
                                 <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel2"
                                     role="tab">
                                     Job Reuests</a>
                             </li>


                             <li class="nav-item">

                                 <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel3"
                                     role="tab">
                                     </i>Password </a>
                             </li>

                         </ul>
                     </div>
                 </div>
             </div>




             <div class="tab-content card shadow-box-example z-depth-5 " style="margin-top: 20px">
                 <div class="tab-pane fade in show active animated zoomIn" id="panel1" role="tablist">
                     <div class="">
                         <div class="col-md-5 mx-auto text-center">
                             @if ($consultant->profile_pic)
                                 <img style="width: 70px; height: 70px" class="rounded-circle"
                                     src="/storage/profile_pics/{{ $consultant->profile_pic }}" alt=""
                                     srcset="">
                                 <br>
                             @else
                                 <img style="width: 70px; height: 70px" class="rounded-circle"
                                     src="{{ url('images/user.jpg') }}" alt="" srcset=""> <br>
                             @endif
                             <p class="fw-bold mb-3 py-2">{{ $consultant->name }}</p>

                             <span class="fw-bold  badge badge-success">{{ $consultant->role }}</span>
                             <br>

                             <div class="form-group">
                                 {!! Form::open([
                                     'action' => ['App\Http\Controllers\Admin\AdminConsultantsController@update', $consultant->id],
                                     'method' => 'POST',
                                     'enctype' => 'multipart/form-data',
                                 ]) !!}

                                 {{ Form::file('profile_pic', ['style' => 'font-size:12px']) }}
                                 {{ Form::hidden('_method', 'PUT') }}
                                 {{ Form::submit('UPLOAD', ['class' => 'btn btn-sm btn-primary']) }}
                                 {!! Form::close() !!}
                             </div>



                         </div>

                         <div class="col-md-10 mx-auto">
                             {!! Form::open([
                                 'action' => ['App\Http\Controllers\Admin\AdminFreelancersController@update', $consultant->id],
                                 'method' => 'POST',
                             ]) !!}

                             <div class="row">
                                 <div class="col">
                                     {{ Form::label('username', 'Username') }}
                                     {{ Form::text('username', $consultant->name, ['class' => 'form-control', 'plcaholder' => 'Username']) }}

                                 </div>
                                 <div class="col">
                                     {{ Form::label('email', 'Email') }}
                                     {{ Form::email('email', $consultant->email, ['class' => 'form-control', 'plcaholder' => 'Email']) }}
                                 </div>
                                 <div class="col">
                                     {{ Form::label('role', 'Role') }}
                                     {{ Form::text('role', $consultant->role, ['class' => 'form-control', 'plcaholder' => 'Role']) }}
                                 </div>

                             </div>
                             <br>
                             <br>
                             {{ Form::hidden('_method', 'PUT') }}
                             {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
                             {!! Form::close() !!}

                         </div>

                     </div>
                 </div>



                 <div class="tab-pane fade" id="panel2" role="tabpanel">
                     @if (count($jobs_req) == 0)
                         <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
                             <div class="mx-auto">

                                 <h4 class="m-4 ">No Job Requets</h4>

                             </div>
                         </div>
                     @else
                         <section>
                             <h4 class="card-title h4 mb-3"><strong><a href="" class="grey-text">Job
                                         Requests.</a></strong></h4>

                             <div class="card card-cascade narrower z-depth-1">
                                 <div
                                     class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                                     <a href="" class="white-text mx-3">Choose job request to edit</a>
                                 </div>


                                 <div class="px-4">
                                     <div class="table-responsive">
                                         <table class="table table-hover mb-1">
                                             <thead>
                                                 <tr>


                                                     <th class="w-auto"><strong>ID</strong></th>
                                                     <th class="w-auto"><strong>Job Title</strong></th>
                                                     <th class="w-auto"><strong>Amount</strong></th>
                                                     <th class="w-auto"><strong>Description</strong></th>
                                                     <th class="w-auto"><strong>Qualification</strong></th>

                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($jobs_req as $item)
                                                     <tr>
                                                         <td>{{ $loop->iteration }}</td>
                                                         <td>{{ $item->job_title }}</td>
                                                         <td>{{ $item->amount }} TZS</td>
                                                         <td>{!! Str::limit($item->job_description, 50) !!}</td>
                                                         <td>{{ $item->job_qualification }}</td>

                                                         <td><a href="{{ url('/manage_jobs/' . $item->id . '/edit') }}"
                                                                 class="btn btn-sm btn-primary">edit</a>
                                                         </td>

                                                         <td> <a href="#deleteJobModal{{ $item->id }}"
                                                                 class="btn btn-sm btn-danger" data-toggle="modal">
                                                                 DELETE
                                                                 </i></a>
                                                         </td>

                                                     </tr>
                                                     <div id="deleteJobModal{{ $item->id }}" class="modal fade">
                                                         <div class="modal-dialog">
                                                             <div class="modal-content">

                                                                 <div class="modal-header">
                                                                     <h4 class="card-title h4 mb-3"><strong><a
                                                                                 href="" class="grey-text">DELETE
                                                                                 JOB</a></strong></h4>
                                                                     <button type="button" class="close"
                                                                         data-dismiss="modal"
                                                                         aria-hidden="true">&times;</button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                     <p>Are you sure you want to delete this job request?
                                                                     </p>
                                                                     <p class="text-warning"><small>This action cannot be
                                                                             undone.</small></p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                     <input type="button" class="btn btn-sm btn-default"
                                                                         data-dismiss="modal" value="Cancel">
                                                                     {!! Form::open([
                                                                         'action' => ['App\Http\Controllers\Admin\AdminJobRequestsController@destroy', $item->id],
                                                                         'method' => 'POST',
                                                                     ]) !!}
                                                                     {{ Form::hidden('_method', 'DELETE') }}
                                                                     @csrf
                                                                     <button type="submit" class="btn btn-danger btn-sm"
                                                                         style="float:right">Delete</button>

                                                                     {!! Form::close() !!}
                                                                 </div>

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
                     @endif
                 </div>


                 <div class="tab-pane fade col-md-9 mx-auto animated fadeIn" id="panel3" role="tabpanel">
                     <form method="POST" action="{{ route('password.update') }}">
                         @csrf
                         <div class="row">
                             <div class="col">
                                 <label for="password" :value="__('Password')">Password</label>

                                 <input id="password" class="form-control" type="password" name="password" required />
                             </div>
                             <div class="col">
                                 <label for="password_confirmation" :value="__('Confirm Password')">Confirm
                                     Password</label>
                                 <input id="password_confirmation" class="form-control" type="password"
                                     name="password_confirmation" required />
                             </div>
                         </div>
                         <div class="flex items-center justify-end mt-4">
                             <button class="btn btn-sm btn-primary">
                                 {{ __('Reset Password') }}
                             </button>
                         </div>
                     </form>
                 </div>

             </div>
         </section>
     </div>
 @endsection
