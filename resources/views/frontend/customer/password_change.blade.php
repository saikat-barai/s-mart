@extends('frontend.master')
@section('body_content')

    <body class="index-opt-1 catalog-product-view catalog-view_op1 page-order">

        <div class="wrapper">



            <!-- HEADER -->
            @include('frontend.includes.header')
            <!-- end HEADER -->
            <div class="" style="height: 50px;">

            </div>
            <!-- MAIN -->
            <main class="">

                <div class="container">
                    <div class="row my-5">
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <div class="text-center pt-8">
                                        @if (Auth::user()->profile_photo == null)
                                            <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" width=""
                                                alt="" />
                                        @else
                                            <img src="{{ asset('public/files/profile/' . Auth::user()->profile_photo) }}"
                                                width="20" alt="" />
                                        @endif
                                    </div>
                                    <h3 class="text-center">SAikat</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Profile</li>
                                    <li class="list-group-item">My Order</li>
                                    <li class="list-group-item">Wishlist</li>
                                    <li class="list-group-item">Logout</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header text-center mb-5">
                                    Change Password
                                </div>
                                @if (Session('password_error'))
                                    <div class="alert alert-danger">
                                        {{ Session('password_error') }}
                                    </div>
                                @endif
                                @if (Session('password_update'))
                                    <div class="alert alert-success">
                                        {{ Session('password_update') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body mt-3">
                                    <form action="{{ route('customer.password.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Current Password</label>
                                                    <input class="form-control" type="password" name="current_password"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">New Password</label>
                                                    <input class="form-control" type="password" name="password"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Confirm Password</label>
                                                    <input class="form-control" type="password" name="password_confirmation"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <div class="mb-3">
                                                    <input type="submit" value="Update" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main><!-- end MAIN -->

            <!-- FOOTER -->
            @include('frontend.includes.footer')
            <!-- end FOOTER -->

            <!--back-to-top  -->
            <a href="#" class="back-to-top">
                <i aria-hidden="true" class="fa fa-angle-up"></i>
            </a>

        </div>




        <!-- jQuery -->
        @include('frontend.includes.js')
    </body>
@endsection
