@extends('layouts.app')

@section('content')
    <div class="mx-auto mt-5 pt-2 col-md-10">
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mt-5"> <a class="font-weight-bold white-text mr-4"
                href="#">Home</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <form class="search-form ml-auto" role="search">
                    <div class="form-group md-form my-0 waves-light"> <input type="text" class="form-control"
                            placeholder="Search"> </div>
                </form>
            </div>
        </nav>
    </div>
    @if (count($jobs))
        <div class="m-5 mt-2 pt-2 col-md-10 mx-auto ">
            <section class="pb-5">
                <section class="">
                    <div class=" mb-4">
                        @foreach ($jobs as $job)
                            @php
                                $user = \App\Models\User::where('id', $job->user_id)->first();
                            @endphp
                            <div class="card card-ecommerce hoverable mb-4">
                                <div class="row">
                                    <div class="col-12 pl-4">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3"><strong><a href=""
                                                        class="blue-text">{{ $job->job_title }}</a></strong></h5>
                                            <h5><span class="badge grey mt-2">Posted by: {{ $user->name }}</span><span
                                                    class="badge grey mt-2 m-2">Amount: {{ $job->amount }}</span>
                                            </h5>
                                            <p class="mt-3">{{ $job->job_description }}</p>


                                            <div class="card-footer pb-0">
                                                <div class="row">
                                                    <span
                                                        class="float-left mt-3"><small>{{ $job->created_at->diffForHumans() }}</small></span>
                                                    <span class="float-right ml-auto">
                                                        <a href="/freelancer/viewjob/{{ $job->id }}"
                                                            class="btn btn-sm btn-primary text-white">view</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="py-4 mx-auto" style="margin-left: 20px">
                            {{ $jobs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </section>
            </section>
        </div>
    @else
        <h4 class="my-4 pt-5 text-center dark-grey-text font-weight-bold mx-auto">Nothing to show here</h4>
    @endif
@endsection
