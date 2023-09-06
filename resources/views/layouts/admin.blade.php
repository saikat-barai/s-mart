<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend')}}/images/favicon.png">
    <link href="{{asset('public/backend')}}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('publick/backend') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('public/backend/vendor/toastr/css/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@yield('body')
<!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('public/backend')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('public/backend')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{asset('public/backend')}}/js/custom.min.js"></script>
    <script src="{{asset('public/backend')}}/js/deznav-init.js"></script>
    <script src="{{ asset('public/backend/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/vendor/toastr/js/toastr.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
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

</html>