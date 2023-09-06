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
                        <h4 class="card-title">All Trash Categories</h4>
                    </div>
                    {{-- <div class="col-md-6 text-right">
                    <a data-toggle="modal" data-target="#addcategory" href="" class="btn btn-secondary">+Add New</a>
                </div> --}}
                </div>

                <div class="card-body">
                    <form action="{{ route('selected.resotre.from.trash') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id="check_all"><label
                                                for="check_all">&nbsp; All Check</label></th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash_categories as $key => $trash_category)
                                        <tr>
                                            <td><input type="checkbox" name="category_id[]"
                                                    value="{{ $trash_category->id }}" id="" class="chkDel"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $trash_category->category_name }}</td>
                                            <td>
                                                @if ($trash_category->category_image)
                                                    <img class="rounded-circle" width="70" height="70"
                                                        src="{{ asset('public/files/category/' . $trash_category->category_image) }}"
                                                        alt="">
                                            </td>
                                        @else
                                            <img class="rounded-circle" width="70" height="70"
                                                src="{{ asset('public/files/category/defaulcategorytphoto/category.png') }}"
                                                alt=""></td>
                                    @endif
                                    <td><a
                                            href="javascript:void(0);"><strong>{{ $trash_category->category_slug }}</a></strong>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('category.restore', ['id' => $trash_category->id]) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1" id="edit"
                                                data-id="{{ $trash_category->id }}"><i title="restore"
                                                    class="fa fa-reply"></i></a>
                                            <a id="delete"
                                                href="{{ route('category-delete', ['id' => $trash_category->id]) }}"
                                                class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
@endsection
@section('footer_content')
    <script>
        $("#check_all").on('click', function() {
            this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
        })
    </script>
@endsection
