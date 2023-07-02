@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto">
        @include('layouts.alerts')
        <div class="row">

            <div class="col-md-9">

                <h4 class="card-title h4 my-4 "><strong><a href="" class="text-dark">APPLICATIONS.</a></strong></h4>
            </div>

        </div>



        @if (count($applications) > 0)
            <div class="card card-cascade narrower z-depth-3 mt-4">
                <div
                    class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                    <a href="" class="white-text mx-3">Appied Jobs</a>
                </div>


                <div class="px-4 hoverable">
                    <div class="table-responsive ">
                        <table class="table table-hover mb-1">
                            <thead>
                                <tr>


                                    <th class="w-auto"><strong>ID</strong></th>
                                    <th class="w-auto"><strong>Job Title</strong></th>
                                    <th class="w-auto"><strong>Job Amount</strong></th>
                                    <th class="w-auto"><strong>Freelancer</strong></th>
                                    <th class="w-auto"><strong>Status</strong></th>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $item)
                                    @php
                                        $job = \App\Models\JobRequest::where('id', $item->jobrequest_id)->first();
                                        $freelancer = \App\Models\User::where('id', $item->freelancer_id)->first();
                                        $category = \App\Models\category::where('user_id', $item->freelancer_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $job->amount }} TZS</td>
                                        <td>{{ $freelancer->name }}</td>
                                        @if ($item->status == 'accepted')
                                            <td><span class="badge badge-success">{{ $item->status }}</span></td>
                                        @elseif($item->status == 'rejected')
                                            <td><span class="badge badge-danger">{{ $item->status }}</span></td>
                                        @else
                                            <td><span class="badge badge-info">not reviewed</span></td>
                                        @endif

                                        <td> <a href="/consultant/apply/{{ $item->id }}" class="btn btn-sm btn-primary">
                                                View
                                                </i></a>
                                        </td>


                                    </tr>
                                    <div id="viewJobModal{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="card-title h4 mb-3"><strong><a href=""
                                                                class="text-dark">Application</a></strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="m-1 mb-4">
                                                        <h4 class="card-title h4 mb-3"><strong><a href=""
                                                                    class="grey-text">{{ $category->name_of_expertise }}</a></strong>
                                                        </h4>
                                                        <div class="ml-auto row ">

                                                            <h5><span
                                                                    class="badge grey mt-2">{{ $category->category }}</span>
                                                            </h5>
                                                            <h5><span
                                                                    class="badge grey mt-2 ml-2">{{ $category->years_of_experience }}
                                                                    Years of
                                                                    Experience</span></h5>

                                                        </div>

                                                        <p class="mt-3">My name is {{ $freelancer->name }}, I am based of
                                                            {{ $category->category }} with
                                                            {{ $category->name_of_expertise }} years of experience,
                                                            plz hire right now me or i wil kill you. Im not playing with you
                                                        </p>




                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open([
                                                        'action' => ['App\Http\Controllers\Consultant\ApplicationsConsultantController@update', $item->id],
                                                        'method' => 'POST',
                                                    ]) !!}


                                                    {{ Form::hidden('num', '1') }}

                                                    {{ Form::hidden('_method', 'PUT') }}
                                                    {{ Form::submit('Accept', ['class' => 'btn btn-sm btn-success']) }}
                                                    {!! Form::close() !!}

                                                    {!! Form::open([
                                                        'action' => ['App\Http\Controllers\Consultant\ApplicationsConsultantController@update', $item->id],
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @else
            <h4 class="card-title pt-5  text-center h4 mb-3 mx-auto"><strong><a href="" class="grey-text">Nothing
                        to show here..</a></strong></h4>
        @endif
    </section>
@endsection
