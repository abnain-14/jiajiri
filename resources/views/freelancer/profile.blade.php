@extends('layouts.app')


@section('content')
    <div class="m-5 mx-auto pt-3 col-md-10">
        <section class="pb-5">
            <div class=" mt-5 mb-5">
                <div class="">
                    <div class="">

                        <ul class="nav md-tabs nav-justified grey lighten-3 mx-0" role="tablist">

                            <li class="nav-item">

                                <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel1"
                                    role="tab"> Profile</a>
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
                            @if (Auth::user()->profile_pic)
                                <img style="width: 70px; height: 70px" class="rounded-circle"
                                    src="/storage/profile_pics/{{ Auth::user()->profile_pic }}" alt=""
                                    srcset=""> <br>
                            @else
                                <img style="width: 70px; height: 70px" class="rounded-circle"
                                    src="{{ url('images/user.jpg') }}" alt="" srcset=""> <br>
                            @endif
                            <p class="fw-bold mb-3 py-2">{{ Auth::user()->name }}</p>

                            <span class="fw-bold  badge badge-success">{{ Auth::user()->role }}</span>
                            <br>

                            <div class="form-group">
                                {!! Form::open([
                                    'action' => ['App\Http\Controllers\Freelancer\FreelancerProfileController@update', Auth::user()->id],
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
                                'action' => ['App\Http\Controllers\Freelancer\FreelancerProfileController@update', Auth::user()->id],
                                'method' => 'POST',
                            ]) !!}

                            <div class="row">
                                <div class="col">
                                    {{ Form::label('username', 'Username') }}
                                    {{ Form::text('username', Auth::user()->name, ['class' => 'form-control', 'plcaholder' => 'Username']) }}

                                </div>
                                <div class="col">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', Auth::user()->email, ['class' => 'form-control', 'plcaholder' => 'Email']) }}
                                </div>


                            </div>


                            <div class="row pt-3">
                                <div class="col">
                                    {{ Form::label('acc_num', 'Account number') }}
                                    {{ Form::text('acc_num', Auth::user()->acc_number, ['class' => 'form-control', 'plcaholder' => 'Account number']) }}

                                </div>
                                <div class="col">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', Auth::user()->phone, ['class' => 'form-control', 'plcaholder' => 'Email']) }}
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



                <div class="tab-pane fade col-md-9 mx-auto" id="panel3" role="tabpanel">


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
