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
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card card-ecommerce">
                                    <div class="row">
                                        <div class="col-4 d-flex align-items-center">
                                            <div class="view overlay">
                                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg"
                                                    class="img-fluid" alt="">
                                                <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-6 pl-0">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1"><strong><a href=""
                                                            class="dark-grey-text">Web Development</a></strong></h5>



                                                <span class="badge badge-danger mb-3">bestseller</span>
                                                <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <span class="float-left mt-3"><strong>2339$</strong></span>
                                                        <span class="float-right ml-auto">
                                                            <a class="btn btn-sm btn-primary text-dark">view</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card card-ecommerce">
                                    <div class="row">
                                        <div class="col-4 d-flex align-items-center">
                                            <div class="view overlay">
                                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg"
                                                    class="img-fluid" alt="">
                                                <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-6 pl-0">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1"><strong><a href=""
                                                            class="dark-grey-text">Web Development</a></strong></h5>



                                                <span class="badge badge-danger mb-3">bestseller</span>
                                                <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <span class="float-left mt-3"><strong>2339$</strong></span>
                                                        <span class="float-right ml-auto">
                                                            <a class="btn btn-sm btn-primary text-dark">view</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>
@endsection
