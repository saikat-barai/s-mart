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
                    <div class="page-content page-order text-center">
                        <img style="width: 50%" src="{{ asset('public/files/order/success.png') }}" alt="">
                        <h1>Congratulations !!</h1>
                        {{-- <button>Ba</button> --}}
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
