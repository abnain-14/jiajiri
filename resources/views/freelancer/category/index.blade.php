@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 mt-5 pb-5 mx-auto ">

    @include('layouts.alerts')
        <div class="row">

            <div class="col-md-10">
                <h4 class="card-title h4 my-4 "><strong><a href="" class="text-dark">CATEGORIES.</a></strong></h4>
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
                                    <th class="w-auto"><strong>ID</th></strong>
                                    <th class="w-auto"><strong>Expertise</th></strong>
                                    <th class="w-auto"><strong>Experience</th></strong>
                                    <th class="w-auto"><strong>Category</th></strong>
                                    <th class="w-auto"><strong>Work Experience</th></strong>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td class="w-auto">{{ $loop->iteration }}</td>
                                        <td class="w-auto">{{ $item->name_of_expertise }}</td>
                                        <td class="w-auto">{{ $item->years_of_experience }} Years</td>
                                        <td class="w-auto">{{ $item->category }}</td>
                                        <td class="w-auto">{!! Str::limit( $item->work_experience, 20) !!}</td>

                                        <td><a href="{{ url('/freelancer/category/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-primary mx-3">edit</a>
                                                <a href="#deleteCategoryModal{{ $item->id }}" class="btn btn-sm btn-danger mx-3"
                                                data-toggle="modal">
                                                DELETE
                                                </i></a>
                                        </td>
                                        

                                    </tr>
                                    <div id="deleteCategoryModal{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="card-title h4 mb-3"><strong><a href=""
                                                                class="grey-text">DELETE CATEGORY.</a></strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this job category?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal" value="Cancel">
                                                    {!! Form::open([
                                                        'action' => ['App\Http\Controllers\Freelancer\CategoryController@destroy', $item->id],
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
        @else
            <h4 class="card-title pt-5  text-center h4 mb-3 mx-auto"><strong><a href="" class="grey-text">Nothing
                        to show here..</a></strong></h4>
        @endif
    </section>
@endsection
