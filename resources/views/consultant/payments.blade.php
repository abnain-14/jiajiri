@extends('layouts.app')

@section('content')
    <section class="col-md-9 pt-5 pb-5 mt-5 mx-auto">
    @include('layouts.alerts')
        <div class="row">

            <div class="col-md-10">

                <h4 class="card-title h4 my-4 "><strong><a href="" class="text-dark">PAYMENTS.</a></strong></h4>
            </div>

        </div>



        @if (count($payments) > 0)
            <div class="card card-cascade narrower z-depth-3 mt-4">
                <div
                    class="view view-cascade gradient-card-header blue-gradient narrower p-2 mx-4 my-3 d-flex justify-content-between align-items-center">
                    <a href="" class="white-text mx-3">Job Requests</a>
                </div>


                <div class="px-4 hoverable">
                    <div class="table-responsive ">
                        <table class="table table-hover mb-1">
                            <thead>
                                <tr>


                                    <th class="w-auto"><strong>ID</strong></th>
                                    <th class="w-auto"><strong>Job Title</strong></th>
                                    <th class="w-auto"><strong>Freelancer</strong></th>
                                    <th class="w-auto"><strong>Amount</strong></th>
                                    <th class="w-auto"><strong>Account</strong></th>
                                  

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $item)
                                    @php
                                        $job = \App\Models\JobRequest::where('id', $item->job_id)->first();
                                        $freelancer = \App\Models\User::where('id', $item->freelancer_id)->first();
                                        
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $freelancer->name }}</td>
                                        <td>{{ $job->amount }} TZS</td>
                                        <td>{{ $freelancer->acc_number }}</td>

                                        @if (is_null($item->payslip))
                                            <td><a class="btn btn-sm btn-primary" data-toggle="modal"
                                                    href="#pay{{ $item->id }}">pay</a></td>
                                        @elseif($item->status == 'confirmed')
                                            <td><span class="badge badge-success p-1">Confirmed..</span></td>
                                        @else
                                            <td><span class="badge badge-info p-1">Pending..</span></td>
                                        @endif


                                    </tr>
                                    <div id="pay{{ $item->id }}" class="modal fade">

                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Receipt Upload </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pay using the account number
                                                        <strong>{{ $freelancer->acc_number }}</strong> then
                                                        upload your
                                                        receipt here, it will be reviewd as soon as posiible
                                                    </p>
                                                    <div class="form-group">


                                                        <form action="/consultant/payslip/upload/{{ $item->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" name="payslip" style="font-size:12px">
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Upload</button>
                                                        </form>

                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @else
            <h4 class="card-title pt-5  text-center h4 mb-3 mx-auto"><strong><a href="" class="grey-text">Nothing
                        to show here..</a></strong></h4>
        @endif
    </section>
@endsection
