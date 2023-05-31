{{-- @extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <table class="table m-auto py-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Job Description</th>
                    <th scope="col">Job Qualified</th>
                    <th scope="col">Job Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>

                        <td>{{ $job->id }}</td>
                        <td>{{ $job->job_title }}</td>
                        <td><a href="/freelancerhome/{{ $job->id }}">{{ $job->job_description }}</a></td>
                        <td>{{ $job->job_qualification }}</td>
                        <td>{{ $job->amount }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <br>
@endsection --}}





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
    <div class="m-5 mt-2 pt-2 col-md-10 mx-auto">
        <section class="pb-5">
            <section class="">
                <div class=" mb-4">
                 @foreach ($jobs as $job)
                    <div class="card card-ecommerce hoverable mb-4">
                        <div class="row">
                            <div class="col-12 pl-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">{{ $job->job_title }}</a></strong></h5>
                                    <p class="mt-3">{{ $job->job_description }}</p>

                                    <div class="card-footer pb-0">
                                        <div class="row">
                                            <span class="float-left mt-3">{{ $job->created_at->diffForHumans() }}</span>
                                            <span class="float-right ml-auto">
                                                <a class="btn btn-sm btn-primary text-dark">view</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </section>
    </div>
@endsection
