@extends('category.layout')
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
 @foreach($category as $item)
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
@endsection