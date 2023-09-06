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
                                            <a href="index.html"><img
                                                    src="{{ asset('public/backend') }}/images/logo-full.png"
                                                    alt=""></a>
                                        </div>
                                        <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                        <form method="POST" action="{{ route('customer.login.form') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Email</strong></label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entire Your Email">
                                                @if (session('error'))
                                                    <strong style="color: red">{{ session('error') }}</strong>
                                                @endif
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
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox ml-1 text-white">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="basic_checkbox_1">
                                                        <label class="custom-control-label" for="basic_checkbox_1">Remember
                                                            my preference</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a class="text-white" href="page-forgot-password.html">Forgot
                                                        Password?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-white text-primary btn-block">Sign Me
                                                    In</button>
                                            </div>
                                        </form>
                                        <div class="new-account mt-3">
                                            <p class="text-white">Don't have an account? <a class="text-white"
                                                    href="{{ route('register') }}">Sign up</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
@endsection
