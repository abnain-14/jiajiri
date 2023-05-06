@extends('category.layout')
@section('content')
  
<div class="card">
  <div class="card-header">Register Your Job Category</div>
  <div class="card-body">
       
      <form action="{{ url('/freelancer/category') }}" method="POST">
        {!! csrf_field() !!}
        <label>Name of Expertise</label></br>
        <input type="text" name="name_of_expertise" id="name_of_expertise" class="form-control"></br>
        <label>Years of Experience</label></br>
        <input type="number" name="years_of_experience" id="years_of_experience" class="form-control"></br>
        <label for="category">Category</label></br>
        <select name="category" id="category" class="form-control">
            <option selected>--category--</option>
            <option value="Graphics Design">Graphics Design</option>
            <option value="Web Design">Web Design</option>
            <option value="System analyst">System analyst</option>
            <option value="Project Manager">Project Manager</option>
            <option value="Mobile Developer">Mobile Developer</option>
            <option value="Database Administrator">Database Administrator</option>
        </select>
        <br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop