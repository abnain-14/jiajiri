@extends('jobrequest.layout')
@section('content')
<a href="{{url('/freelancer/profile')}}" style="color:black;">BACK</a>
  
<div class="card">
  <div class="card-header">Edit Profile</div>
  <div class="card-body">
       
      <form action="{{ url('/freelancer/profile') }}" method="POST">
        {!! csrf_field() !!}
        <!-- <label>Image</label></br>
        <input type="text" name="fullname" id="fullname" class="form-control"></br> -->
        <label>About Me</label></br>
        <textarea type="text" name="about_me" id="about_me" class="form-control"></textarea></br>
        <label>Resume</label></br>
        <input type="text" name="resume" id="resume" class="form-control"></br>
        <label>Contact</label></br>
        <input type="text" name="contact" id="contact" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop