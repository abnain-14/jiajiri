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
                            <h4 class="card-title h4 mb-3"><strong><a href=""
                                        class="grey-text">{{ $category->name_of_expertise }}</a></strong></h4>
                            <div class="ml-auto row ">

                                <h5><span class="badge grey mt-2">{{ $category->category }}</span></h5>
                                <h5><span class="badge grey mt-2 ml-2">{{ $category->years_of_experience }} Years of
                                        Experience</span></h5>

                            </div>

                            <p class="mt-3">{!! nl2br(e($category->work_experience)) !!}</p>

                            <div class="row">
                                <span
                                    class="float-left mt-4 col"><small>{{ $category->created_at->diffForHumans() }}</small></span>
                                <div class="col-md-2 mt-3 float-right"> <a href="#contact{{ $category->id }}"
                                        data-toggle="modal" class="btn btn-primary btn-sm">contact</a></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contact{{ $category->id }}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="card-title h4 mb-3"><strong><a href="" class="grey-text">Contact</a></strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="text grey-text">Name: <strong>{{ $user->name }} </strong></p>
                        <p class="text grey-text">Email: <strong> {{ $user->email }} </strong></p>
                        <p class="text grey-text">Phone: <strong> {{ $user->phone }}</strong></p>

                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
