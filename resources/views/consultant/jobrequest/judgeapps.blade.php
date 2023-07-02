@extends('layouts.app')

@section('content')
    @php
        $job = \App\Models\JobRequest::where('id', $application->jobrequest_id)->first();
        $freelancer = \App\Models\User::where('id', $application->freelancer_id)->first();
        $category = \App\Models\category::where('user_id', $application->freelancer_id)->first();
    @endphp
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto">
        <div class="card mt-2 hoverable  z-depth-2">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        <div class="m-1 mb-4">
                            <h4 class="card-title h4 mb-3"><strong><a href=""
                                        class="grey-text">{{ $freelancer->name }}</a></strong></h4>
                            @if ($application->status == 'accepted')
                                <span class="badge badge-success ">Accepted</span>
                            @elseif ($application->status == 'rejected')
                                <span class="badge badge-danger ">Rejected</span>
                            @else
                                <span class="badge badge-info ">Pending</span>
                            @endif
                            <div class="ml-auto row ">

                                <h5><span class="badge grey mt-2">{{ $category->category }}</span></h5>
                                <h5><span class="badge grey mt-2 ml-2">{{ $category->years_of_experience }} Years of
                                        Experience</span></h5>

                            </div>

                            <p class="mt-3">My name is {{ $freelancer->name }}, I am based of {{ $category->category }}
                                with
                                {{ $category->name_of_expertise }} years of experience,
                                plz hire right now me or i wil kill you. Im not playing with you</p>

                            <a class="btn btn-sm btn-grey" target="_blank" href="/storage/cv/{{ $freelancer->cv }}">Open CV</a>

                            <div class="row ml-auto float-right">
                                {!! Form::open([
                                    'action' => ['App\Http\Controllers\Consultant\ApplicationsConsultantController@update', $application->id],
                                    'method' => 'POST',
                                ]) !!}


                                {{ Form::hidden('num', '1') }}

                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Accept', ['class' => 'btn btn-sm btn-success']) }}
                                {!! Form::close() !!}

                                {!! Form::open([
                                    'action' => ['App\Http\Controllers\Consultant\ApplicationsConsultantController@update', $application->id],
                                    'method' => 'POST',
                                ]) !!}
                                {{ Form::hidden('num', '0') }}

                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Reject', ['class' => 'btn btn-sm btn-danger']) }}
                                {!! Form::close() !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
