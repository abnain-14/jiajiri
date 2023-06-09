 @extends('layouts.admin_app')

 @section('content')

     @include('layouts.alerts')
     @if (count($freelancers) > 0)
         <section>

             <div class="row mx-auto">
                 <h5 class="mt-3 dark-grey-text font-weight-bold col-md-9 animated fadeIn">Manage Freelancers</h5>
                 <a href="#addUserModal" class="btn btn-sm btn-primary ml-auto col-md-1" data-toggle="modal">ADD</a>
             </div>
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
                                     {{ Form::select('role', [ 'freelancer' => 'freelancer'], '', ['class' => 'mdb-select md-form']) }}


                                 </div>

                                 {{ Form::submit('Submit', ['class' => 'btn btn-sm btn-primary ml-auto']) }}
                                 {!! Form::close() !!}


                             </div>
                         </div>


                     </div>
                 </div>
             </div>

             <div class="card card-cascade narrower z-depth-1">
                 <div
                     class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                     <a href="" class="white-text mx-3">Choose a freelancer to edit</a>
                 </div>


                 <div class="px-4 hoverable">
                     <div class="table-responsive ">
                         <table class="table table-hover mb-1 animated fadeIn">
                             <thead>
                                 <tr>
                                     <th class="th-lg"><strong>Username</strong>
                                     <th class="th-lg"><strong>Email</strong>
                                     <th class="th-lg"><strong>Role</strong>
                                     <th class="th-lg"><strong>Categories</strong>
                                     <th class="th-lg"><strong>Applications</strong>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($freelancers as $freelancer)
                                     @php
                                         $pplications = \App\Models\Applications::where('freelancer_id', $freelancer->id)->count();
                                         $categories = \App\Models\Category::where('user_id', $freelancer->id)->count();
                                     @endphp
                                     <tr>
                                         <td>{{ $freelancer->name }}</td>
                                         <td>{{ $freelancer->email }}</td>
                                         <td>{{ $freelancer->role }}</td>
                                         <td>{{ $categories }}</td>
                                         <td>{{ $pplications }}</td>
                                         <td>

                                             <a href="/manage_freelancers/{{ $freelancer->id }}"
                                                 class="btn btn-sm btn-primary mx-3">edit</a>

                                             <a href="#deleteUserModal{{ $freelancer->id }}"
                                                 class="btn btn-sm btn-danger mx-3" data-toggle="modal">
                                                 DELETE
                                                 </i></a>
                                         </td>


                                     </tr>
                                     <div id="deleteUserModal{{ $freelancer->id }}" class="modal fade">
                                         <div class="modal-dialog">
                                             <div class="modal-content">

                                                 <div class="modal-header">
                                                     <h4 class="card-title h4 mb-3"><strong><a href=""
                                                                 class="grey-text">DELETE FREELANCER</a></strong></h4>
                                                     <button type="button" class="close" data-dismiss="modal"
                                                         aria-hidden="true">&times;</button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p>Are you sure you want to delete this freelancer?</p>
                                                     <p class="text-warning"><small>This action cannot be undone.</small>
                                                     </p>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <input type="button" class="btn btn-sm btn-default"
                                                         data-dismiss="modal" value="Cancel">
                                                     {!! Form::open([
                                                         'action' => ['App\Http\Controllers\Admin\AdminFreelancersController@destroy', $freelancer->id],
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
     @else
         <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
             <div class="mx-auto">

                 <h4 class="m-4 ">No Freelancers</h4>

             </div>
         </div>
     @endif
 @endsection
