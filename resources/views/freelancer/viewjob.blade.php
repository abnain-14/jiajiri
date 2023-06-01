@extends('layouts.app')

@section('content')
    @php
        $user = \App\Models\User::where('id', $job->user_id)->first();
    @endphp
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto ">
        <div class="card mt-2 hoverable shadow-box-example z-depth-3">
            <div class="m-3">
                <div class="col-lg-12 m-auto">
                    <div class="m-3">
                        <div class="m-1 mb-4">
                            <h3 class="text blue-text m-2"><strong>{{ $job->job_title }}</strong></h3>
                            <h5><span class="badge pink mt-2 m-2">Posted by: {{ $user->name }}</span> <span
                                    class="badge pink mt-2 m-2">Amount: {{ $job->amount }}</span>
                            </h5>
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
                                <span
                                    class="float-left m-2 col"><small>{{ $job->created_at->diffForHumans() }}</small></span>
                                <div class=" mt-3 float-right"> <a href="" class="btn btn-primary btn-sm"> apply</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
