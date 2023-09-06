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
                        <h4 class="card-title">All Childcategories List</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#addsubcategory" href="" class="btn btn-secondary">+Add
                            New</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
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
                                @foreach ($childcategories as $key => $childcategory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $childcategory->category->category_name }}</td>
                                        <td>{{ $childcategory->subcategory->subcategory_name }}</td>
                                        <td>{{ $childcategory->childcategory_name }}</td>
                                        <td>
                                            <img class="" width="45" height="45"
                                                src="{{ isset($childcategory->childcategory_image) ? asset('public/files/childcategory/' . $childcategory->childcategory_image):'public/files/childcategory/defaultphoto/childcategory.png' }}"
                                                alt="">
                                        <td>
                                            <a
                                                href="javascript:void(0);"><strong>{{ $childcategory->childcategory_slug }}</a></strong>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    id="edit" data-id="{{ $childcategory->id }}" data-toggle="modal"
                                                    data-target="#editchildcategory"><i class="fa fa-pencil"></i></a>
                                                <a id=""
                                                    href="{{ route('childcategory.soft.delete', ['id' => $childcategory->id]) }}"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add subcategory modal******* --}}
    <div class="modal fade" id="addsubcategory" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Childcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('childcategory-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-sm-3 col-form-label">Subcategory Name</label>
                            </div>
                            @php
                                $default = DB::table('subcategories')->latest()->first();
                            @endphp
                            <div class="col-md-8">
                                <div class="input-group mb-3 ">
                                    <select class="form-control default-select" id="" name="subcategory_id">
                                        <option selected disabled value="{{ $default->id }}">Select A Subcategory...</option>
                                        @foreach ($categories as $category)
                                            <option disabled value="" style="color: #F94687"><b>{{ $category->category_name }}</b></option>
                                            @php
                                                $subcategories= DB::table('subcategories')->where('category_id',$category->id)->get();
                                            @endphp
                                           @foreach ($subcategories as $subcategory)
                                           <option value="{{ $subcategory->id }}">---{{ $subcategory->subcategory_name }}</option>
                                           @endforeach
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-sm-3 col-form-label">Childcategory Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" required name="childcategory_name"
                                    placeholder="Entire Childcategory Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="dropify" type="file" name="childcategory_image" id="">
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
    <div class="modal fade" id="editchildcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Childcategory</h5>
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
            let childcategory_id = $(this).data('id');
            $.get("childcategory/childcategory-edit/" + childcategory_id, function(data) {
                $('#modal_body').html(data);
            });
        });
    </script>
@endsection
