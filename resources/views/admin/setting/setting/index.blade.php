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
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-auto">WEBSITE SETTING</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('update-setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <select class="form-control default-select" id="" name="country">
                                        <option selected disabled value="৳">Select A Country...</option>
                                        <option value="Bangladesh"><b>Bangladesh</b></option>
                                        <option value="United State"><b>United State</b></option>
                                        <option value="India"><b>India</b></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Currency</label>
                                    <select class="form-control default-select" id="" name="currency">
                                        <option selected disabled value="৳">Select A Currency...</option>
                                        <option value="৳"><b>TK</b></option>
                                        <option value="$"><b>USD</b></option>
                                        <option value="₹"><b>RUPEE</b></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Main Email</label>
                                    <input type="Email" class="form-control" placeholder="Entire Main Email" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Support Email</label>
                                    <input type="Email" class="form-control" placeholder="Entire Support Email" name="support_email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="" for="">Logo</label>
                                    <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="logo">
                                    <img src="" style="max-height: 80px; widows: 80px;" alt="" id="blah">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Icon</label>
                                    <input type="file" class="form-control" onchange="document.getElementById('icon').src = window.URL.createObjectURL(this.files[0])" name="icon">
                                    <img src="" style="max-height: 80px; widows: 80px;" alt="" id="icon">
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <strong style="color: green">-----Other Option-----</strong>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" name="twitter">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Instragram</label>
                                    <input type="text" class="form-control" name="instragram">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Linkdin</label>
                                    <input type="text" class="form-control" name="linkdin">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="youtube">
                                </div>

                                <div class="form-group col-md-12">
                                    {{-- <input type="checkbox" checked data-toggle="toggle" data-on="ON" data-off="OFF" data-onstyle="success" data-offstyle="danger">
                                    <label></label> --}}
                                    <input class="btn btn-primary btn-block" type="submit" value="Update Setting">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add category modal******* --}}
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Category Name</label>
                                <input type="text" class="form-control" @required(true) name="category_name"
                                    placeholder="Entire Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Image</label>
                                <input class="col-sm-12 col-form-label dropify" type="file" name="category_image"
                                    id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Add New">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit category modal --}}
    <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit A Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_body">

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('body').on('click', '#edit', function() {
            let category_id = $(this).data('id');
            $.get("category/category-edit/" + category_id, function(data) {
                $('#modal_body').html(data);
            });
        });
    </script>
@endsection
