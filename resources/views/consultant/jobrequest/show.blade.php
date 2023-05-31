@extends('consultant.jobrequest.layout')
@section('content')
<div class="card-header">
<h3>Job Request Page</h3></div>
<br>
<div class="card-body">
<h5 class="card-title">Job Title : {{ $jobrequest->job_title }}</h5><br>
<p class="card-text">Amount : {{ $jobrequest->amount }}</p>
<p class="card-text">Job Description : {{ $jobrequest->job_description }}</p>
<p class="card-text">Job Qualification : {{ $jobrequest->job_qualification }}</p>
</div>
</div>
@endsection