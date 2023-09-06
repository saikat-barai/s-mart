@extends('admin.maser')
@section('content_body')
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Color List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($colors as $color)
                            <tr>
                                <td>{{ $color->color_name }}</td>
                                <td><span class="badge" style="background-color: {{ $color->color_code }};"><strong
                                            class="">{{ $color->color_name }}</strong></span></td>
                                <td>
                                    <a href="{{ route('color.delete', ['id' => $color->id]) }}"
                                        class="btn btn-danger shadow btn-xs sharp m-auto"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('color.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Color Name</label>
                            <input class="form-control" type="text" name="color_name" id="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Color Code</label>
                            <input class="form-control" type="text" name="color_code" id="">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary" type="submit" value="+ Color">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Size List</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                       @foreach ($categories as $category)
                       <div class="col-sm-6">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                {{ $category->category_name }}
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Size Name</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse (App\Models\Size::where('category_id', $category->id)->get() as $size)
                                    <tr>
                                        <td>{{ $size->size_name }}</td>
                                        <td>
                                            <a id="" href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('size.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="category_id" id="">
                                <option value="" selected disabled>Select A Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Size Name</label>
                            <input class="form-control" type="text" name="size_name" id="">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary" type="submit" value="+ Size">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
