@extends('frontend.master')
@section('body_content')

    <body class="index-opt-1 catalog-product-view catalog-view_op1 page-order">

        <div class="wrapper">



            <!-- HEADER -->
            @include('frontend.includes.header')
            <!-- end HEADER -->

            <!-- MAIN -->
            <main class="site-main">

                <div class="columns container">
                    <!-- Block  Breadcrumb-->

                    <ol class="breadcrumb no-hide">
                        <li><a href="{{ route('/') }}">Home </a></li>
                        <li class="active">Your shopping cart</li>
                    </ol><!-- Block  Breadcrumb-->

                    <h2 class="page-heading">
                        <span class="page-heading-title2">Shopping Cart Summary</span>
                    </h2>

                    <div class="page-content page-order">
                        <div class="heading-counter warning">Your shopping cart contains:
                            <span
                                class="badge badge-success">{{ App\Models\Cart::where('customer_id', Auth::user()->id)->count() }}
                                Product</span>
                        </div>
                        <div class="heading-counter warning"><h1>Your Billing Information:</h1>
                        </div>
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <div class="order-detail-content">
                                <div class="table-responsive">
                                    <div class="col-lg-8 p-5" style="background-color: beige">
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" @required(true) name="fname"
                                                    placeholder="First Name*">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" @required(true) name="lname"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" @required(true) name="email"
                                                    placeholder="Email*">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" @required(true) name="phone"
                                                    placeholder="Phone Number*">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-6">
                                                <select class="form-control" name="country_id" id="country">
                                                    <option value="" selected disabled>Country*</option>
                                                    @foreach ($countries as $key => $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="city_id" id="city">
                                                    <option value="" selected disabled>City/Town*</option>   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" @required(true) name="zip"
                                                    placeholder="Postcode/ZIP*">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" @required(true) name="company_name"
                                                    placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" @required(true) name="address"
                                                    placeholder="Address*">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 20px">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="additional_info" id="" cols="30" rows="10"
                                                    placeholder="Additional Information"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class=""
                                            style="padding-left: 35px; padding-right: 35px; padding-top: 30px; padding-bottom: 30px; border: 1px solid rgb(192, 189, 189)">
                                            <div>
                                                <h3>Delivery Charge</h3>
                                                <hr>
                                            </div>
                                            <input class="delivery" data-total="{{ session('total_price_after_discount') }}"
                                                type="radio" id="inside" name="delivery_charge" value="1">
                                            <label for="inside">Inside City : &#2547; 70</label><br>
                                            <input class="delivery" data-total="{{ session('total_price_after_discount') }}"
                                                type="radio" id="outside" name="delivery_charge" value="2">
                                            <label for="outside">Outside City :&#2547; 100</label><br>
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    <h4 class="">Subtotal :</h4>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <h4>&#2547; <span id="">{{ session('subtotal') }}</span></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    <h4 class="">Discount :</h4>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <h4>&#2547; <span
                                                            id="">{{ session('subtotal') - session('total_price_after_discount') }}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    <h3 class="">Total :</h3>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <h3>&#2547; <span
                                                            id="total_price_after_discount">{{ session('total_price_after_discount') }}</span>
                                                    </h3>
                                                </div>
                                            </div>
                                            <input type="hidden" name="total" value="{{ session('total_price_after_discount') }}">
                                            <input type="hidden" name="sub_total" value="{{ session('subtotal') }}">
                                            <input type="hidden" name="discount" value="{{ session('subtotal') - session('total_price_after_discount') }}">
                                        </div>
                                        <hr>
                                        <div class=""
                                            style=" margin-top: 40px; padding-left: 35px; padding-top: 30px; padding-bottom: 30px; border: 1px solid rgb(192, 189, 189)">
                                            <div>
                                                <h3>Payment</h3>
                                                <hr>
                                            </div>
                                            <input type="radio" id="cash_on" name="payment_mathod" value="1">
                                            <label for="cash_on">Cash On Delevery</label><br>
                                            <input type="radio" id="ssl" name="payment_mathod" value="2">
                                            <label for="ssl">Pay With SSl-Commerce</label><br>
                                            <input type="radio" id="stripe" name="payment_mathod" value="3">
                                            <label for="stripe">Pay With STRIPE</label><br>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="cart_navigation text-right">
                                    {{-- <a href="#" class="prev-btn">Continue shopping</a> --}}
                                    {{-- <a href="{{ route('checkout') }}" class="next-btn">Proceed to checkout</a> --}}
                                    <input type="submit" style="background-color: #ff255b" class="btn btn-danger "
                                        value="Proceed to checkout">
                                </div>
                            </div>
                        </form>

                    </div>
                    <br>
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

    </body>
    <script>
        $('.delivery').click(function() {
            var inside = 60;
            var outside = 100;
            var delivery = $(this).val();
            var total = $(this).attr('data-total');
            var final_total = 0;
            if (delivery == 1) {
                final_total = parseInt(total) + inside;
            } else {
                final_total = parseInt(total) + outside;
            }
            $('#total_price_after_discount').html(final_total);
        })
    </script>
    <script>
        $('#country').change(function() {
            var country_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'getcity',
                data: {
                    'country_id': country_id
                },
                success: function(data) {
                    $('#city').html(data);
                }
            });
        })
    </script>
@endsection
