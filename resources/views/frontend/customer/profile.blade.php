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
                                    @if(Auth::user()->profile_photo == NULL)
                                    <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" width="" alt=""/>
                                    @else
                                    <img src="{{ asset('public/files/profile/'.Auth::user()->profile_photo) }}" width="20" alt=""/>
                                    @endif
                                </div>
                                <h3 class="text-center">{{ Auth::user()->name }}</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Profile</li>
                              <li class="list-group-item"><a href="{{ route('customer.password.change') }}">Change Password</a></li>
                              <li class="list-group-item">My Order</li>
                              <li class="list-group-item">Wishlist</li>
                              <li class="list-group-item">Logout</li>
                            </ul>
                          </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header mb-5">
                              Edit Profile
                            </div>
                            <div class="card-body mt-3">
                                <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input class="form-control" type="text" name="name" id="" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Phone</label>
                                                <input class="form-control" type="text" name="phone" id="" value="{{ Auth::user()->phone }}" placeholder="Entire Phone number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Image</label>
                                                <input class="form-control" type="file" name="image" id="" value="">
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
        {{-- <script>
            var td = document.getElementsByClassName('cartabc');
            var array = Array.from(td);
            array.map((item) => {
                console.log(item);
            })
        </script> --}}
        <script>
            function handleClickPlusBtn(target) {
                var plusvalue = parseInt(target.parentNode.childNodes[1].value) + 1;
                if (plusvalue > '12') {
                    var plusvalue = parseInt('12');
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                } else {
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                }
            }

            function handleClickMinusBtn(target) {
                var plusvalue = parseInt(target.parentNode.childNodes[1].value) - 1;
                if (plusvalue < '1') {
                    plusvalue = parseInt('1');
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                } else {
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                }
                //    console.log(plusvalue);
            }
        </script>
    </body>
@endsection
