@extends('category.layout')
@section('content')
<div class="card-header">
<h3>Categories Page</h3></div>
<br>
<div class="card-body">
<h5 class="card-title">Name of Expertise : {{ $category->name_of_expertise }}</h5><br>
<p class="card-text">Years of Experience : {{ $category->years_of_experience }}</p>
<p class="card-text">Category : {{ $category->category }}</p>
</div>
</div>
@endsection