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
                                     Categories</a>
                             </li>


                             <li class="nav-item">

                                 <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel3"
                                     role="tab">
                                     </i>Password </a>
                             </li>

                                  <li class="nav-item">

                                <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel4"
                                    role="tab">
                                    </i>CV </a>
                            </li>

                         </ul>
                     </div>
                 </div>
             </div>




             <div class="tab-content card shadow-box-example z-depth-5 " style="margin-top: 20px">
                 <div class="tab-pane fade in show active animated zoomIn" id="panel1" role="tablist">
                     <div class="">
                         <div class="col-md-5 mx-auto text-center">
                             @if ($freelancer->profile_pic)
                                 <img style="width: 70px; height: 70px" class="rounded-circle"
                                     src="/storage/profile_pics/{{ $freelancer->profile_pic }}" alt=""
                                     srcset="">
                                 <br>
                             @else
                                 <img style="width: 70px; height: 70px" class="rounded-circle"
                                     src="{{ url('images/user.jpg') }}" alt="" srcset=""> <br>
                             @endif
                             <p class="fw-bold mb-3 py-2">{{ $freelancer->name }}</p>

                             <span class="fw-bold  badge badge-success">{{ $freelancer->role }}</span>
                             <br>

                             <div class="form-group">
                                 {!! Form::open([
                                     'action' => ['App\Http\Controllers\Admin\AdminFreelancersController@update', $freelancer->id],
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
                                 'action' => ['App\Http\Controllers\Admin\AdminFreelancersController@update', $freelancer->id],
                                 'method' => 'POST',
                             ]) !!}

                             <div class="row">
                                 <div class="col">
                                     {{ Form::label('username', 'Username') }}
                                     {{ Form::text('username', $freelancer->name, ['class' => 'form-control', 'plcaholder' => 'Username']) }}

                                 </div>
                                 <div class="col">
                                     {{ Form::label('email', 'Email') }}
                                     {{ Form::email('email', $freelancer->email, ['class' => 'form-control', 'plcaholder' => 'Email']) }}
                                 </div>


                             </div>


                             <div class="row pt-3">
                                 <div class="col">
                                     {{ Form::label('acc_num', 'Account number') }}
                                     {{ Form::text('acc_num', $freelancer->acc_number, ['class' => 'form-control', 'plcaholder' => 'Account number']) }}

                                 </div>
                                 <div class="col">
                                     {{ Form::label('phone', 'Phone') }}
                                     {{ Form::text('phone', $freelancer->phone, ['class' => 'form-control', 'plcaholder' => 'Email']) }}
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
                     @if (count($categories) == 0)
                         <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
                             <div class="mx-auto">

                                 <h4 class="m-4 ">No Categories</h4>

                             </div>
                         </div>
                     @else
                         <section>

                             <h4 class="card-title h4 mb-3"><strong><a href=""
                                         class="grey-text">Categories.</a></strong></h4>

                             <div class="card card-cascade narrower z-depth-1">
                                 <div
                                     class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                                     <a href="" class="white-text mx-3">Choose category to edit</a>
                                 </div>


                                 <div class="px-4">
                                     <div class="table-responsive">
                                         <table class="table table-hover mb-1">
                                             <thead>
                                                 <tr>
                                                     <th class="w-auto"><strong>ID</th></strong>
                                                     <th class="w-auto"><strong>Expertise</th></strong>
                                                     <th class="w-auto"><strong>Experience</th></strong>
                                                     <th class="w-auto"><strong>Category</th></strong>

                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($categories as $item)
                                                     <tr>
                                                         <td class="w-auto">{{ $loop->iteration }}</td>
                                                         <td class="w-auto">{{ $item->name_of_expertise }}</td>
                                                         <td class="w-auto">{{ $item->years_of_experience }} Years</td>
                                                         <td class="w-auto">{{ $item->category }}</td>

                                                         <td class="w-auto"><a
                                                                 href="{{ url('/manage_category/' . $item->id . '/edit') }}"
                                                                 class="btn btn-sm btn-primary mx-2">edit</a>

                                                             <a href="#deleteCategoryModal{{ $item->id }}"
                                                                 class="btn btn-sm btn-danger mx-2" data-toggle="modal">
                                                                 DELETE
                                                                 </i></a>
                                                         </td>



                                                     </tr>
                                                     <div id="deleteCategoryModal{{ $item->id }}" class="modal fade">
                                                         <div class="modal-dialog">
                                                             <div class="modal-content">

                                                                 <div class="modal-header">
                                                                     <h4 class="card-title h4 mb-3"><strong><a
                                                                                 href="" class="grey-text">DELETE
                                                                                 CATEGORY.</a></strong></h4>
                                                                     <button type="button" class="close"
                                                                         data-dismiss="modal"
                                                                         aria-hidden="true">&times;</button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                     <p>Are you sure you want to delete this job category?
                                                                     </p>
                                                                     <p class="text-warning"><small>This action cannot be
                                                                             undone.</small></p>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                     <input type="button" class="btn btn-sm btn-default"
                                                                         data-dismiss="modal" value="Cancel">
                                                                     {!! Form::open([
                                                                         'action' => ['App\Http\Controllers\Admin\AdminCategoryController@destroy', $item->id],
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

                     <div class="tab-pane fade col-md-9 mx-auto" id="panel4" role="tabpanel">

                    @if ($freelancer->cv == null)
                        <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
                            <div class="mx-auto">

                                <h4 class="m-5">No CV uploaded, please upload a PDF file</h4>
                                <div class="form-group align-items-center text-center">
                                    <form action="/admin/freelancer/cvupload/{{ $freelancer->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="cv" style="font-size:12px">
                                        <button class="btn btn-sm btn-primary" type="submit">Upload</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="dark-grey-text d-flex  align-items-center pt-3 pb-4 pl-4 ">
                            <div class="mx-auto">

                                <h4 class="m-5">CV uploaded, you can view it <a href="/storage/cv/{{ $freelancer->cv }}" target="_blank">here!</a>, to update just upload new</h4>
                                <div class="form-group align-items-center text-center">
                                    <form action="/freelancer/cvupload/{{ $freelancer->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="cv" style="font-size:12px">
                                        <button class="btn btn-sm btn-primary" type="submit">Upload</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endif

                </div

             </div>
         </section>
     </div>
 @endsection
