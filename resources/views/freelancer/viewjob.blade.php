@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 mt-5 mx-auto">
        <div class="card mt-2 hoverable">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        <div class="m-1 mb-4">
                            <h3 class="text m-2"><strong>{{ $job->job_title }}</strong></h3>
                            <div class="ml-auto row ">
                                @php
                                    $skillsArray = explode(',', $job->job_qualification);
                                    
                                @endphp
                                @foreach ($skillsArray as $skill)
                                    <h5><span class="badge grey m-2">{{ $skill }}</span></h5>
                                @endforeach
                            </div>
                            <p class="m-2">{{ $job->job_description }}</p>

                            <div class="row">
                                <span class="float-left m-2 col">{{ $job->created_at->diffForHumans() }}</span>
                                <div class=" mt-3 float-right"> <a href="" class="btn btn-primary btn-sm"> apply</a></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
