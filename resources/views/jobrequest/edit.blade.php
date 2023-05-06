@extends('jobrequest.layout')
@section('content')
<div class="card-header">
<h3>Job Requests</h3></div>
<br>   
<form action="{{ url('/consultant/jobrequest/' .$jobrequest->id) }}" method="post">
  {!! csrf_field() !!}
  @method("PATCH")
<input type="hidden" name="id" id="id" value="{{$jobrequest->id}}" id="id" />
<label>Job Title</label></br>
<input type="text" name="job_title" id="job_title" value="{{$jobrequest->job_title}}" class="form-control"></br>
<label>Amount</label></br>
<input type="number" name="amount" id="amount" value="{{$jobrequest->amount}}" class="form-control"></br>
<label>Job Description</label></br>
<input type="text" name="job_description" id="job_description" value="{{$jobrequest->job_description}}" class="form-control",></br>
<label>Job Qualification</label></br>
<input type="text" name="job_qualification" id="job_qualification" value="{{$jobrequest->job_qualification}}" class="form-control"></br>
<input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop</div>