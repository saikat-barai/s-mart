<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>S-Mart - E-Commerce Admin Dashboard</title>
    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/backend') }}/images/favicon.png"> --}}
    <link rel="stylesheet" href="{{ asset('public/backend') }}/vendor/chartist/css/chartist.min.css">
    <link href="{{ asset('public/backend') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="{{ asset('public/backend') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('public/backend/vendor/toastr/css/toastr.min.css') }}">

    <!-- Datatable -->
    <link href="{{ asset('public/backend') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('public/backend') }}/css/style.css" rel="stylesheet">


    {{-- dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    {{-- dropzone --}}
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    {{-- bootstrap toggle --}}
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    {{-- flaticon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    {{-- other --}}
    <link
        rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="crossorigin="anonymous"referrerpolicy="no-referrer" />
    <style>
        .toggle-button .check-box {
            transform: scale(2);
        }

        .toggle-button input[type="checkbox"] {
            position: relative;
            appearance: none;
            width: 29px;
            height: 15px;
            background: #ccc;
            border-radius: 50px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: 0.4s;
        }

        .toggle-button input:checked[type="checkbox"] {
            background: #7da6ff;
        }

        .toggle-button input[type="checkbox"]::after {
            position: absolute;
            content: "";
            width: 16px;
            height: 15px;
            top: 0;
            left: 0;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            transform: scale(1.1);
            transition: 0.4s;
        }

        .toggle-button input:checked[type="checkbox"]::after {
            left: 50%;
        }
    </style>
</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.includes.nav-header')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        @include('admin.includes.chat-box')
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.includes.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.includes.sideber')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content_body')
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.includes.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


</body>
<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="{{ asset('public/backend') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('public/backend') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('public/backend') }}/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="{{ asset('public/backend') }}/js/custom.min.js"></script>
<script src="{{ asset('public/backend') }}/js/deznav-init.js"></script>
<script src="{{ asset('public/backend') }}/vendor/owl-carousel/owl.carousel.js"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('public/backend') }}/vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="{{ asset('public/backend') }}/vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('public/backend') }}/js/dashboard/dashboard-1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="{{ asset('backend/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script> --}}

<script src="{{ asset('public/backend/vendor/toastr/js/toastr.min.js') }}"></script>

{{-- extra ************** --}}

{{-- <script src="{{asset('public/backend')}}/vendor/global/global.min.js"></script> --}}
{{-- <script src="{{asset('public/backend')}}/js/custom.min.js"></script> --}}
<script src="{{ asset('public/backend') }}/js/deznav-init.js"></script>

<!-- Datatable -->
<script src="{{ asset('public/backend') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/backend') }}/js/plugins-init/datatables.init.js"></script>

{{-- dropify --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- bootstrap toggle --}}
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
{{-- dropzone --}}

{{-- flaticon cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
    function carouselReview() {
        /*  testimonial one function by = owl.carousel.js */
        jQuery('.testimonial-one').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 30,
            nav: false,
            dots: false,
            left: true,
            navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                484: {
                    items: 2
                },
                882: {
                    items: 3
                },
                1200: {
                    items: 2
                },

                1540: {
                    items: 3
                },
                1740: {
                    items: 4
                }
            }
        })
    }
    jQuery(window).on('load', function() {
        setTimeout(function() {
            carouselReview();
        }, 1000);
    });
</script>
<script>
    $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are You Want To Delete???",
                text: "Once Delete, This Will Be Permanently Delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal({
                        title: "Data safe...!!!",
                    });
                }
            });
    });
</script>
<script>
    $(document).on("click", "#logout", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are You Want To Logout???",
                // text: "Once Delete, This Will Be Permanently Delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal({
                        title: "Continue Logged In...!!!",
                    });
                }
            });
    });
</script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}")
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}")
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}")
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}")
                break;
        }
    @endif
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

{{-- ******* bootstrap toggle switch button ********* --}}
@yield('footer_content')

</html>
