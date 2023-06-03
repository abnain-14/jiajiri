@extends('layouts.app')

@section('content')
    <section class="col-md-8 pt-5 pb-5 mt-5 mx-auto">
        <div class="col-md-10">
            <h5 class="my-4 dark-grey-text font-weight-bold">Edit Job Category</h5>
        </div>
        <div class="card mt-3 hoverable">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">

                        {!! Form::open([
                            'action' => ['App\Http\Controllers\Freelancer\CategoryController@update', $category->id],
                            'method' => 'POST',
                        ]) !!}
                        <div class="row">
                            <div class="col m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('name_of_expertise', 'Name of Expertise') }}
                                    {{ Form::text('name_of_expertise', $category->name_of_expertise, ['class' => 'form-control form-control', 'plcaholder' => 'Name of Expertise']) }}

                                </div>
                            </div>

                            <div class="col m-auto">

                                {{ Form::label('category', 'Category') }}
                                {{ Form::select('category', ['Graphics Design' => 'Graphics Design', 'Web Design' => 'Web Design', 'System analyst' => 'System analyst', 'Project Manager' => 'Project Manager', 'Mobile Developer' => 'Mobile Developer', 'Database Administrator' => 'Database Administrator'], '', ['class' => 'mdb-select md-form']) }}

                            </div>

                            <div class="col m-auto">
                                <div class="md-form form-sm">
                                    {{ Form::label('years_of_experience', 'Years of Experience') }}
                                    {{ Form::text('years_of_experience', $category->years_of_experience, ['class' => 'form-control form-control', 'plcaholder' => 'Years of Experience']) }}

                                </div>
                            </div>

                        </div>

                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('update', ['class' => 'btn btn-sm btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
@endsection
