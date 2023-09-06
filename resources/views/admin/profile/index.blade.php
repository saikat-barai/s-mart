@extends('admin.maser')
@section('content_body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <div class="m-auto">

                                @if (Auth::user()->profile_photo == null)
                                <img id="blah" style="max-width: 100px; position: relative;"
                                        src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                                        class="img-fluid rounded-circle" alt="">
                                @else
                                <img id="blah" style="max-width: 100px; position: relative;"
                                        src="{{ asset('public/files/profile/' . Auth::user()->profile_photo) }}"
                                        class="img-fluid rounded-circle" alt="">
                                @endif

                                {{-- @if (Auth::user()->profile_photo)
                                    <img id="blah" style="max-width: 100px; position: relative;"
                                        src="{{ asset('public/files/profile/' . Auth::user()->profile_photo) }}"
                                        class="img-fluid rounded-circle" alt="">
                                @else
                                    <img style="max-width: 100px; position: relative;" src="" id="blah"
                                        class="img-fluid rounded-circle" alt="">
                                @endif --}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="name" class="form-control" required name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" required name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Profile Photo</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="" value="{{ Auth::user()->profile_photo }}" name="old_profile_photo">
                                <input type="file" class="form-control" name="profile_photo"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <input class="btn btn-primary btn-block" type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- password change section  --}}
        <div class="col-lg-7 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="m-auto">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('not_match'))
                        <div class="alert alert-danger">{{ session('not_match') }}</div>
                    @endif
                    <form action="{{ route('password-update') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Entire Old Password"
                                    name="old_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Entire New Password"
                                    name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <input class="btn btn-primary btn-block" type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
