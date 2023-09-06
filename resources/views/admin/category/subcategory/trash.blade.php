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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6">
                        <h4 class="card-title">All SubCategories List</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#addsubcategory" href="" class="btn btn-secondary">+Add
                            New</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('subcategory.restore.from.trash') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id="check_all"><label
                                                for="check_all">&nbsp;ALL</label></th>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Icon</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash_subcategories as $key => $trash_subcategory)
                                        <tr>
                                            <td><input type="checkbox" name="subcategory_id[]" id="" class="chkDel"
                                                    value="{{ $trash_subcategory->id }}"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $trash_subcategory->category->category_name }}</td>
                                            <td>{{ $trash_subcategory->subcategory_name }}</td>
                                            <td><img class="" width="45" height="45"
                                                    src="{{ isset($trash_subcategory->subcategory_image) ? asset('public/files/subcategory/' . $trash_subcategory->subcategory_image) : 'public/files/subcategory/defaultphoto/subcategory.png' }}"
                                                    alt=""></td>
                                            <td><a
                                                    href="javascript:void(0);"><strong>{{ $trash_subcategory->subcategory_slug }}</a></strong>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('subcategory.restore', ['id' => $trash_subcategory->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        data-id="{{ $trash_subcategory->id }}"><i
                                                            class="fa fa-reply"></i></a>
                                                    <a id="delete"
                                                        href="{{ route('subcategory.delete.from.trash', ['id' => $trash_subcategory->id]) }}"
                                                        class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-danger" name="action" value="delete">Seleted Delete</button>
                            <button class="btn btn-secondary" name="action" value="restore">Seleted Resote</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- add subcategory modal******* --}}
    <div class="modal fade" id="addsubcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subcategory-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-sm-3 col-form-label">Category Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-3 ">
                                    <select class="form-control" id="" name="category_id">
                                        <option selected disabled>Select A Category...</option>
                                        <option selected hidden value="">Category</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach --}}

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-sm-3 col-form-label">Subcategory Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" required name="subcategory_name"
                                    placeholder="Entire Category Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="dropify" type="file" name="subcategory_image" id="">
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
@endsection
@section('footer_content')
    <script>
        $("#check_all").on('click', function() {
            this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
        })
    </script>
@endsection
