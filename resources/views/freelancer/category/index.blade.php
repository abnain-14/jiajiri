{{-- @extends('freelancer.category.layout')
@section('content')
<div class="card-header">
    <a href="{{url('/freelancerhome')}}" style="color:black;">Home</a>
    <br>
    <br>
<h3>Register Categories</h3></div>
<br>
<a href="{{ url('/freelancer/category/create') }}" class="btn btn-success btn-sm" title="register ">Register Category</a>
<br>
<table class="table">
<thead>
<tr>
 <th>#</th>
 <th>Name of Expertise</th>
 <th>Years of Experience</th>
 <th>Category</th>
</tr>
 </thead>
 <tbody>
 @foreach ($category as $item)
 <tr>
  <td>{{ $loop->iteration }}</td>
  <td>{{ $item->name_of_expertise }}</td>
  <td>{{ $item->years_of_experience }}</td>
  <td>{{ $item->category }}</td>
    <td><a href="{{ url('/freelancer/category/' . $item->id) }}" title="View Job"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
    </td>
  <td><a href="{{ url('/freelancer/category/' . $item->id . '/edit') }}" title="Edit Job"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
    </td>
<form method="POST" action="{{ url('/freelancer/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
 {{ method_field('DELETE') }}
 {{ csrf_field() }}
 <td><button type="submit" class="btn btn-danger btn-sm" title="Delete Job" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
</form></td>
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
 </div>
@endsection --}}



@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 mt-5 mx-auto">
        <div class="row">

            <div class="col-md-10">
                <h5 class="my-4 dark-grey-text font-weight-bold">Categories</h5>
            </div>
            <div class="col-md-2"> <a href="{{ url('/freelancer/category/create') }}"
                    class="btn btn-primary btn-sm float-right mt-4" title="register">Add</a></div>
        </div>


        @if (count($category) > 0)


        <div class="card card-cascade narrower z-depth-1 mt-4">
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name_of_expertise }}</td>
                                    <td>{{ $item->years_of_experience }} Years</td>
                                    <td>{{ $item->category }}</td>

                                    <td><a href="{{ url('/freelancer/category/' . $item->id . '/edit') }}"
                                            class="btn btn-sm btn-primary">edit</a>
                                    </td>
                                    <td>
                                    <td> <a href="#deleteCategoryModal{{$item->id}}" class="btn btn-sm btn-danger" data-toggle="modal">
                                            DELETE
                                            </i></a>
                                    </td>

                                </tr>
                                <div id="deleteCategoryModal{{$item->id}}" class="modal fade">
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
                                                <input type="button" class="btn btn-sm btn-default" data-dismiss="modal"
                                                    value="Cancel">
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
