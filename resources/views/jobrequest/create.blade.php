@extends('jobrequest.layout')
@section('content')
  
<div class="card">
  <div class="card-header">Create New Job Request</div>
  <div class="card-body">
       
      <form action="{{ url('/consultant/jobrequest') }}" method="POST">
        {!! csrf_field() !!}
        <label>Job Title</label></br>
        <input type="text" name="job_title" id="job_title" class="form-control"></br>
        <label>Estimate Amount</label></br>
        <input type="number" name="amount" id="amount" class="form-control"></br>
        <label>Job Description</label></br>
        <textarea type="text" name="job_description" id="job_description" class="form-control"></textarea></br>
        <label>Job Qualifications</label></br>
        <input type="text" name="job_qualification" id="job_qualification" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop