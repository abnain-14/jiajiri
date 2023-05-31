{{-- @extends('consultant.jobrequest.layout')
@section('content')
    <div class="card-header">
        <h3>Job Requests</h3>
    </div>
    <br>
    <form action="{{ url('/consultant/jobrequest/' . $jobrequest->id) }}" method="post">
        {!! csrf_field() !!}
        @method('PATCH')
        <input type="hidden" name="id" id="id" value="{{ $jobrequest->id }}" id="id" />
        <label>Job Title</label></br>
        <input type="text" name="job_title" id="job_title" value="{{ $jobrequest->job_title }}" class="form-control"></br>
        <label>Amount</label></br>
        <input type="number" name="amount" id="amount" value="{{ $jobrequest->amount }}" class="form-control"></br>
        <label>Job Description</label></br>
        <input type="text" name="job_description" id="job_description" value="{{ $jobrequest->job_description }}"
            class="form-control",></br>
        <label>Job Qualification</label></br>
        <input type="text" name="job_qualification" id="job_qualification" value="{{ $jobrequest->job_qualification }}"
            class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        
    </form>
    
    </div>
    </div>
    
@stop
</div> --}}



@extends('layouts.app')

@section('content')
    <section class="col-md-8 pt-5 mt-5 mx-auto">
        <div class="col-md-10">
            <h5 class="my-4 dark-grey-text font-weight-bold">Edit Job Request</h5>
        </div>
        <div class="card mt-3 hoverable">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                         {!! Form::open([
                            'action' => ['App\Http\Controllers\Consultant\JobRequestController@update', $jobrequest->id],
                            'method' => 'POST',
                        ]) !!}

                        <div class=" m-auto">
                            <div class="md-form form-sm">
                                {{ Form::label('job_title', 'Job Title') }}
                                {{ Form::text('job_title', $jobrequest->job_title, ['class' => 'form-control form-control', 'plcaholder' => 'Job Title']) }}

                            </div>
                        </div>

                        <div class=" m-auto">
                            <div class="md-form form-sm">
                                {{ Form::label('amount', 'Estimate Amount') }}
                                {{ Form::text('amount', $jobrequest->amount, ['class' => 'form-control form-control', 'plcaholder' => 'Estimate Amount']) }}

                            </div>
                        </div>

                        <div class=" m-auto">
                            <div class="md-form form-sm">
                                {{ Form::label('job_description', 'Job Description') }}
                                {{ Form::textarea('job_description', $jobrequest->job_description, ['class' => 'md-textarea form-control', 'plcaholder' => 'Job Description']) }}

                            </div>
                        </div>
                        <div class=" m-auto">
                            <div class="md-form form-sm">
                                {{ Form::label('job_qualification', 'Job Qualifications') }}
                                {{ Form::text('job_qualification', $jobrequest->job_qualification, ['class' => 'form-control form-control', 'plcaholder' => 'Job Qualifications']) }}

                            </div>
                        </div>

                          {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('update', ['class' => 'btn btn-sm btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
@endsection
