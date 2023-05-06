@extends('jobrequest.layout')
@section('content')
<div class="card-header">
    <a href="{{url('/consultanthome')}}" style="color:black;">Home</a>
    <br>
    <br>
<h3>Job Requests</h3></div>
<br>
<a href="{{ url('/consultant/jobrequest/create') }}" class="btn btn-success btn-sm" title="Add New Job Request"> Post Job</a>
<br>
<table class="table">
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
 @foreach($jobrequest as $item)
 <tr>
  <td>{{ $loop->iteration }}</td>
  <td>{{ $item->job_title }}</td>
  <td>{{ $item->amount }}</td>
  <td>{{ $item->job_description }}</td>
  <td>{{ $item->job_qualification }}</td>
    <td><a href="{{ url('/consultant/jobrequest/' . $item->id) }}" title="View Job"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
    </td>
  <td><a href="{{ url('/consultant/jobrequest/' . $item->id . '/edit') }}" title="Edit Job"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
    </td>
<form method="POST" action="{{ url('/consultant/jobrequest' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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