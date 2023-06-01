@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto">
        <div class="row">

            <div class="col-md-10">
                <h5 class="my-4 dark-grey-text font-weight-bold">Job Requests</h5>
            </div>
            <div class="col-md-2 mt-3"> <a href="{{ url('/consultant/jobrequest/create') }}" class="btn btn-primary btn-sm"
                    title="Add New Job Request"> Post Job</a></div>
        </div>



        @if (count($jobrequest) > 0)
            <div class="card card-cascade narrower z-depth-3 mt-4">
                <div
                    class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                    <a href="" class="white-text mx-3">Job Requests</a>
                </div>


                <div class="px-4 hoverable">
                    <div class="table-responsive ">
                        <table class="table table-hover mb-1">
                            <thead>
                                <tr>


                                    <th class="w-auto"><strong>#</strong></th>
                                    <th class="w-auto"><strong>Job Title</strong></th>
                                    <th class="w-auto"><strong>Amount</strong></th>
                                    <th class="w-auto"><strong>Description</strong></th>
                                    <th class="w-auto"><strong>Qualification</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobrequest as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->job_title }}</td>
                                        <td>{{ $item->amount }} TZS</td>
                                        <td>{!! Str::limit($item->job_description, 50) !!}</td>
                                        <td>{{ $item->job_qualification }}</td>

                                        <td><a href="{{ url('/consultant/jobrequest/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-primary">edit</a>
                                        </td>
                                        <td>
                                        <td> <a href="#deleteJobModal{{ $item->id }}" class="btn btn-sm btn-danger"
                                                data-toggle="modal">
                                                DELETE
                                                </i></a>
                                        </td>

                                    </tr>
                                    <div id="deleteJobModal{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Job Request</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this job request?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal" value="Cancel">
                                                    {!! Form::open([
                                                        'url' => ['App\Http\Controllers\Freelancer\CategoryController@destroy', $item->id],
                                                        'method' => 'POST',
                                                    ]) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}

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
            <h4 class="my-4 pt-5 text-center dark-grey-text font-weight-bold">No Job Requests</h4>
        @endif
    </section>
@endsection
