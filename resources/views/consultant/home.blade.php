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
    <div class="m-5 mt-3 pt-3 col-md-10 mx-auto">
        <section class="pb-5">
            <section class="">
                <div class="row">
                    <div class="col-12 ">

                        <div class="row">
                            @if (count($category) > 0)
                                @foreach ($category as $categor)
                                    @php
                                        $user = \App\Models\User::where('id', $categor->user_id)->first();
                                        $name = $user->name;
                                    @endphp
                                    <div class="col-lg-6 col-md-6 mb-4 ">
                                        <div class="card card-ecommerce hoverable">
                                            <div class="">
                                                <div class="col-12 pl-0 ml-3">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3"><strong><a href=""
                                                                    class="grey-text">{{ $name }}</a></strong>
                                                        </h4>

                                                        <h6 class="card-title mb-1"><a href=""
                                                                class="dark-grey-text">{{ $categor->name_of_expertise }}</a>
                                                        </h6>
                                                        <span
                                                            class="badge badge-primary mb-3 p-1 mt-2">{{ $categor->category }}
                                                        </span>
                                                        <span
                                                            class="badge badge-primary mb-3 p-1 mt-2">{{ $categor->years_of_experience }}
                                                            Years of experience</span>

                                                        <div class="card-footer pb-0">
                                                            <div class="row">
                                                                <span
                                                                    class="float-left mt-3"><small>{{ $categor->created_at->diffForHumans() }}</small></span>
                                                                <span class="float-right ml-auto">
                                                                    <a class="btn btn-sm btn-primary text-white"
                                                                        href="/consultant/viewlancer/{{ $categor->id }}">view</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="my-4 pt-5 text-center dark-grey-text font-weight-bold mx-auto">Nothing to show
                                    here</h4>
                            @endif
                        </div>
                    </div>
            </section>
            <div class="py-4">
                {{ $category->links('pagination::bootstrap-4') }}
            </div>
        </section>
    </div>
@endsection
