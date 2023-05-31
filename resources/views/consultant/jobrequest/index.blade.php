{{-- @extends('layouts.app')

@section('content')

    <div class="m-5 pt-3">
        <section class="pb-5">
        <h2 class="card-title font-weight-bold pt-2 mt-5 ">Job Requests</strong></h2>
        <a href="{{ url('/consultant/jobrequest/create') }}" class="btn btn-success btn-sm" title="Add New Job Request"> Post Job</a>
        
            <div class="card mt-5 hoverable">
                <div class="m-3">
                    <div class="col-lg-12">
                        <div class="px-4">
                            <div class="table-responsive">
                                <table class="table table-hover mb-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Job Title</th>
                                            <th>Estimated Amount</th>
                                            <th>Job Description</th>
                                            <th>Job qualification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobrequest as $item)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->job_title }}</td>
                                                <td>{{ $item->amount }} TZS</td>
                                                <td>{{ $item->job_description }}</td>
                                                <td>{{ $item->job_qualification }}</td>
                                                <td><a href="{{ url('/consultant/jobrequest/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary"> View</a>
                                                </td>
                                                <td><a href="{{ url('/consultant/jobrequest/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-primary">
                                                            Edit</a>
                                                </td>
                                                <form method="POST"
                                                    action="{{ url('/consultant/jobrequest' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <td><button type="submit" class="btn btn-danger btn-sm mt-0"
                                                            title="Delete Job" onclick="return confirm("Confirm
                                                            delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete</button>
                                                </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection --}}




@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 mt-5 mx-auto">
        <div class="row">

            <div class="col-md-10">
                <h5 class="my-4 dark-grey-text font-weight-bold">Job Requests</h5>
            </div>
            <div class="col-md-2 mt-3"> <a href="{{ url('/consultant/jobrequest/create') }}" class="btn btn-primary btn-sm"
                    title="Add New Job Request"> Post Job</a></div>
        </div>


        <div class="card card-cascade narrower z-depth-1 mt-4">
            <div
                class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                <a href="" class="white-text mx-3">Job Requests</a>
            </div>


            <div class="px-4 hoverable">
                <div class="table-responsive ">
                    <table class="table table-hover mb-1">
                        <thead>
                            <tr>


                                <th class="th-lg"><strong>#</strong></th>
                                <th class="th-lg"><strong>Job Title</strong></th>
                                <th class="th-lg"><strong>Estimated Amount</strong></th>
                                <th class="th-lg"><strong>Job Description</strong></th>
                                <th class="th-lg"><strong>Job qualification</strong></th>

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
                                    <td> <a href="#deleteUserModal" class="btn btn-sm btn-danger" data-toggle="modal">
                                            DELETE
                                            </i></a>
                                    </td>

                                </tr>
                                <div id="deleteUserModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this user?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-sm btn-default" data-dismiss="modal"
                                                    value="Cancel">
                                                {!! Form::open([
                                                    'url' => ['App\Http\Controllers\Freelancer\CategoryController@update', $item->id],
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
    </section>
@endsection
