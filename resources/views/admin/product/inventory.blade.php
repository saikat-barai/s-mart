@extends('admin.maser')
@section('content_body')
    <div class="row">
        <div class="col-lg-8">
            <div class="card-header">
                <h3>Inventory List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->rel_to_color->color_name }}</td>
                        <td>{{ $inventory->rel_to_size->size_name }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>
                            <a id="" href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add inventory for,<strong>{{ $product_info->product_name }}</strong></h4>
                </div>
                <div class="card-body shadow">
                    <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                        <div class="mb-3">
                            <select class="form-control" name="color_id" id="">
                                <option value="">Select A Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="size_id" id="">
                                <option value="">Select A Color</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Stock Quantity</label>
                            <input class=" form-control" type="number" name="quantity" id="">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">+ Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
