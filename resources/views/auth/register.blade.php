@extends('layouts.admin')
@section('body')
    <body class="h-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">

                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3">
                                            <a href="{{ route('register') }}"><img style="width: 200px" src="{{asset('public/files')}}/logo/logo.png" alt=""></a>
                                            {{-- <h3 class="text-white">S-Mart</h3> --}}
                                        </div>
                                        <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Username</strong></label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Entire Your Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Email</strong></label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Entire Your Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Password</strong></label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password" placeholder="Entire Your Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Confirm Password</strong></label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Entire Confirm Password">
                                            </div>
                                            <div class="text-center mt-4">
                                                <button type="submit" class="btn bg-white text-primary btn-block">Sign me
                                                    up</button>
                                            </div>
                                        </form>
                                        <div class="new-account mt-3">
                                            <p class="text-white">Already have an account? <a class="text-white"
                                                    href="{{ route('login') }}">Sign in</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
