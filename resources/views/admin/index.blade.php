@extends('layouts.admin_app')

@section('content')
    <section>
        <div class="row animated zoomIn">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card hoverable">
                    <div class="row mt-3">
                        <div class="col-md-5 col-5 text-left pl-4">
                            <a type="button" class="btn-floating btn-lg primary-color ml-4"><i class="far fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>

                        <div class="col-md-7 col-7 text-right pr-5">
                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{ count($freelancers) }}</h5>
                            <p class="font-small grey-text">New Freelancers</p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-7 col-7 text-left pl-4">
                            <p class="font-small font-up ml-4 font-weight-bold">Total Freelancers</p>
                        </div>
                        <div class="col-md-5 col-5 text-right pr-5">
                            <p class="font-small grey-text">{{ count($freelancers) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card hoverable">
                    <div class="row mt-3">
                        <div class="col-md-5 col-5 text-left pl-4">
                            <a type="button" class="btn-floating btn-lg warning-color ml-4"><i class="fas fa-user"
                                    aria-hidden="true"></i></a>
                        </div>

                        <div class="col-md-7 col-7 text-right pr-5">
                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{ count($consultants) }}</h5>
                            <p class="font-small grey-text">New Consultants</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-7 col-7 text-left pl-4">
                            <p class="font-small font-up ml-4 font-weight-bold">Total Consultants</p>
                        </div>
                        <div class="col-md-5 col-5 text-right pr-5">
                            <p class="font-small grey-text">{{ count($consultants) }}</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4 ">
                <div class="card hoverable ">
                    <div class="row mt-3">
                        <div class="col-md-5 col-5 text-left pl-4">
                            <a type="button" class="btn-floating btn-lg light-blue lighten-1 ml-4"><i
                                    class="fas fa-dollar-sign" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-7 col-7 text-right pr-5">
                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{ count($payments) }} </h5>
                            <p class="font-small grey-text">New Payments</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-7 col-7 text-left pl-4">
                            <p class="font-small font-up ml-4 font-weight-bold">Total Payments</p>
                        </div>
                        <div class="col-md-5 col-5 text-right pr-5">
                            <p class="font-small grey-text">{{ count($payments) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
