{{-- @extends('consultant.jobrequest.layout')
@section('content')

    <div class="card">
        <div class="card-header">Create New Job Request</div>
        <div class="card-body">

            <form action="{{ url('/consultant/jobrequest') }}" method="POST">
                {!! csrf_field() !!}
                <label>Job Title</label></br>
                <input type="text" name="job_title" id="job_title" class="form-control"></br>
                <label>Estimate Amount</label></br>
                <input type="number" name="amount" id="amount" class="form-control"></br>
                <label>Job Description</label></br>
                <textarea type="text" name="job_description" id="job_description" class="form-control"></textarea></br>
                <label>Job Qualifications</label></br>
                <input type="text" name="job_qualification" id="job_qualification" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop --}}


@extends('layouts.app')

@section('content')
    <section class="col-md-8 pt-5 mt-5 mx-auto">
        <div class="col-md-10"><h5 class="my-4 dark-grey-text font-weight-bold">Create New Job Request</h5></div>
        <div class="card mt-3 hoverable">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        {!! Form::open(['action' => 'App\Http\Controllers\Consultant\JobRequestController@store', 'method' => 'POST']) !!}
                       
                            <div class=" m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('job_title', 'Job Title') }}
                                    {{ Form::text('job_title', '' , ['class' => 'form-control form-control', 'plcaholder' => 'Job Title']) }}

                                </div>
                            </div>

                            <div class=" m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('amount', 'Estimate Amount') }}
                                    {{ Form::text('amount', '', ['class' => 'form-control form-control', 'plcaholder' => 'Estimate Amount']) }}

                                </div>
                            </div>

                               <div class=" m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('job_description', 'Job Description') }}
                                    {{ Form::textarea('job_description', '', ['class' => 'md-textarea form-control', 'plcaholder' => 'Job Description']) }}

                                </div>
                            </div>
                             <div class=" m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('job_qualification', 'Job Qualifications') }}
                                    {{ Form::text('job_qualification', '', ['class' => 'form-control form-control', 'plcaholder' => 'Job Qualifications']) }}

                                </div>
                            </div>
                      
                        {{ Form::submit('Submit', ['class' => 'btn btn-sm btn-primary ml-auto']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
@endsection
