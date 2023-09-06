@extends('admin.maser')
@section('content_body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-auto">
                    <div class="col-md-12 m-auto">
                        <h4 class="card-title m-auto">Manage Product</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"><label for="check_all">&nbsp;All</label>
                                        </th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>After Dis</th>
                                        <th>SKU</th>
                                        <th>Banner</th>
                                        <th>Today</th>
                                        <th>Trendy</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td><input type="checkbox" name="category_id[]" value="{{ $product->id }}"
                                                    class="chkDel"></td>
                                            <td>
                                                <img class="" width="70" height="70"
                                                    src="{{ asset('public/files/product/preview/' . $product->preview) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}%</td>
                                            <td>{{ $product->after_discount_price }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td class="toggle-button text-center">
                                                <div class="check-box m-auto">
                                                    <input type="checkbox">
                                                </div>
                                            </td>
                                            <td class="toggle-button text-center">
                                                <div class="check-box m-auto">
                                                    <input type="checkbox">
                                                </div>
                                            </td>
                                            <td class="toggle-button text-center">
                                                <div class="check-box m-auto">
                                                    <input type="checkbox">
                                                </div>
                                            </td>
                                            <td class="toggle-button text-center">
                                                <div class="check-box">
                                                    <input type="checkbox">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a id="delete" href="{{ route('inventory', ['id'=>$product->id]) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus-circle"></i></a>
                                                    <a  href="{{ route('delete.product', ['id'=>$product->id]) }}" class="btn btn-danger shadow btn-xs sharp"><i id="delete" class="fa fa-trash"></i></a>
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
@endsection
