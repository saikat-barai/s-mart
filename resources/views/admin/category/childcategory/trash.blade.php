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
                        <h4 class="card-title">Trash Childcategories List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('selected.from.trash') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id="check_all"><label for="check_all">&nbsp; All Check</label></th>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Childcategory</th>
                                        <th>Icon</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash_childcategories as $key => $trash_childcategory)
                                        <tr>
                                            <td><input type="checkbox" name="category_id[]" value="{{ $trash_childcategory->id }}" id="" class="chkDel"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $trash_childcategory->category->category_name }}</td>
                                            <td>{{ $trash_childcategory->subcategory->subcategory_name }}</td>
                                            <td>{{ $trash_childcategory->childcategory_name }}</td>
                                            <td><img class="" width="45" height="45"
                                                    src="{{ isset($trash_childcategory->childcategory_image) ? asset('public/files/childcategory/' . $trash_childcategory->childcategory_image) : 'public/files/childcategory/defaultphoto/childcategory.png' }}"
                                                    alt=""></td>
                                            <td><a
                                                    href="javascript:void(0);"><strong>{{ $trash_childcategory->childcategory_slug }}</a></strong>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('childcategory.restore', ['id' => $trash_childcategory->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-reply"></i></a>
                                                    <a id=""
                                                        href="{{ route('childcategory.soft.delete', ['id' => $trash_childcategory->id]) }}"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('body').on('click', '#edit', function() {
            let childcategory_id = $(this).data('id');
            $.get("childcategory/childcategory-edit/" + childcategory_id, function(data) {
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
