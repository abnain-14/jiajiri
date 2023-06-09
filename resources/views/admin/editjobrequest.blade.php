@extends('layouts.admin_app')

@section('content')
    <section class="col-md-11 pt-3 pb-5 mt-3 mx-auto">
        <div class="col-md-10">
            <h5 class="my-4 dark-grey-text font-weight-bold">EDIT JOB REQUEST.</h5>
        </div>
        <div class="card mt-3 hoverable">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        {!! Form::open([
                            'action' => ['App\Http\Controllers\Admin\AdminJobRequestsController@update', $jobrequest->id],
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
