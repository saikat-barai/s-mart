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
                        <h4 class="card-title">All Categories</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#addcategory" href="" class="btn btn-secondary">+Add
                            New</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('checked.delete') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"><label for="check_all">&nbsp;All</label></th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td><input type="checkbox" name="category_id[]" value="{{ $category->id }}" class="chkDel"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td><img class="rounded-circle" width="70" height="70"
                                                    src="{{ isset($category->category_image) ? asset('public/files/category/' . $category->category_image) : 'public/files/category/defaulcategorytphoto/category.png' }}"
                                                    alt=""></td>
                                            <td><a
                                                    href="javascript:void(0);"><strong>{{ $category->category_slug }}</a></strong>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        id="edit" data-id="{{ $category->id }}" data-toggle="modal"
                                                        data-target="#editcategory"><i class="fa fa-pencil"></i></a>
                                                    <a id=""
                                                        href="{{ route('category.soft.delete', ['id' => $category->id]) }}"
                                                        class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="submit" value="Delete Checked" class="btn btn-danger">
                        </div>
                    </form>
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

@section('footer_content')
<script>
    $("#check_all").on('click', function() {
        this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
    })
</script>
@endsection

