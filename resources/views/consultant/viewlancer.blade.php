@extends('layouts.app')

@section('content')
    @php
        $user = \App\Models\User::where('id', $category->user_id)->first();
        $name = $user->name;
    @endphp
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto">
        <div class="card mt-2 hoverable  z-depth-2">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        <div class="m-1 mb-4">
                            <h3 class="text "><strong>{{ $category->name_of_expertise }}</strong></h3>
                            <div class="ml-auto row ">

                                <h5><span class="badge grey mt-2">{{ $category->name_of_expertise }} Years of Experience</span>
                                </h5>

                            </div>

                            <p class="mt-3">My name is {{ $name }}, I am based of {{ $category->category }} with {{ $category->name_of_expertise  }} years of experience,
                                plz hire right now me or i wil kill you. Im not playing with you</p>

                            <div class="row">
                                <span
                                    class="float-left mt-4 col"><small>{{ $category->created_at->diffForHumans() }}</small></span>
                                <div class="col-md-2 mt-3 float-right"> <a href=""
                                        class="btn btn-primary btn-sm">contact</a></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
