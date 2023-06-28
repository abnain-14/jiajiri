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
                            <h3 class="text blue-text mb-4 m-2"><strong>{{ $job->job_title }}</strong></h3>

                            <div class="ml-auto row ">
                                @php
                                    $skillsArray = explode(',', $job->job_qualification);
                                    
                                @endphp
                                @foreach ($skillsArray as $skill)
                                    <h5><span class="badge grey m-2">{{ $skill }}</span></h5>
                                @endforeach
                            </div>
                            <h5><span class="badge blue mt-1 m-2">Posted by: {{ $user->name }}</span> <span
                                    class="badge blue mt-1 ">Amount: {{ $job->amount }}</span>
                            </h5>
                            <p class="m-2 mt-3">{!! nl2br(e($job->job_description )) !!}</p>

                            <div class="row">
                                <span
                                    class="float-left m-2 col"><small>{{ $job->created_at->diffForHumans() }}</small></span>
                                <div class=" mt-3 float-right">

                                    @php
                                        $app = App\Models\Applications::where('freelancer_id', Auth::user()->id)
                                            ->where('jobrequest_id', $job->id)
                                            ->first();
                                        
                                    @endphp
                                    @if ($app)
                                        @if ($app->status == 'accepted')
                                            <span class="badge badge-success p-2">Accepted</span>
                                        @elseif ($app->status == 'rejected')
                                            <span class="badge badge-danger p-2">Rejected</span>
                                        @else
                                            <span class="badge badge-info p-2">Pending...</span>
                                        @endif
                                    @else
                                        <a href="/freelancer/apply/{{ $job->id }}/edit"
                                            class="btn btn-primary btn-sm"> apply</a>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
