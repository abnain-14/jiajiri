@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 mt-5 pb-5 mx-auto ">
        <div class="row">

            <div class="col-md-10">
                <h5 class="my-4 dark-grey-text font-weight-bold">Categories</h5>
            </div>
            <div class="col-md-2"> <a href="{{ url('/freelancer/category/create') }}"
                    class="btn btn-primary btn-sm float-right mt-4" title="register">Add</a></div>
        </div>


        @if (count($category) > 0)
            <div class="card card-cascade narrower z-depth-1 mt-4 shadow-box-example z-depth-5">
                <div
                    class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                    <a href="" class="white-text mx-3">Categories</a>
                </div>


                <div class="px-4 hoverable">
                    <div class="table-responsive ">
                        <table class="table table-hover mb-1">
                            <thead>
                                <tr>
                                    <th class="w-auto"><strong>#</th></strong>
                                    <th class="w-auto"><strong>Expertise</th></strong>
                                    <th class="w-auto"><strong>Experience</th></strong>
                                    <th class="w-auto"><strong>Category</th></strong>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td class="w-auto">{{ $loop->iteration }}</td>
                                        <td class="w-auto">{{ $item->name_of_expertise }}</td>
                                        <td class="w-auto">{{ $item->years_of_experience }} Years</td>
                                        <td class="w-auto">{{ $item->category }}</td>

                                        <td><a href="{{ url('/freelancer/category/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-primary">edit</a>
                                        </td>
                                        <td>
                                        <td> <a href="#deleteCategoryModal{{ $item->id }}" class="btn btn-sm btn-danger"
                                                data-toggle="modal">
                                                DELETE
                                                </i></a>
                                        </td>

                                    </tr>
                                    <div id="deleteCategoryModal{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Job Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this category?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal" value="Cancel">
                                                    {!! Form::open([
                                                        'url' => ['App\Http\Controllers\Freelancer\JobRequestController@destroy', $item->id],
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
            <h4 class="my-4 pt-5 text-center dark-grey-text font-weight-bold">No Job Categories Created</h4>
        @endif
    </section>
@endsection
