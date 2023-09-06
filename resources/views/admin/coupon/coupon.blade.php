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
                    <h4 class="card-title">All Coupons</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a data-toggle="modal" data-target="#addbrand" href="" class="btn btn-secondary">+Add New</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display min-w850">
                        <thead>
                            <tr>
                                <th>coupon</th>
                                <th>Type</th>
                                <th>Ammount</th>
                                <th>Validity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $key=>$coupon)
                            <tr>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td>{{ $coupon->type==1? 'Percentage' : 'Solid' }}</td>
                                <td><a href="javascript:void(0);"><strong>{{ $coupon->amount }}</a></strong></td>
                                <td><a href="javascript:void(0);"><strong>
                                  @if (Carbon\Carbon::now() > $coupon->validity)
                                      <span class="badge badge-danger">Expired {{ Carbon\Carbon::now()->diffInDays($coupon->validity) }} Days Ago</span>
                                  @else
                                  <span class="badge badge-success">{{ Carbon\Carbon::now()->diffInDays($coupon->validity) }} Days Remaining</span>
                                  @endif    
                                </a></strong></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-primary shadow btn-xs sharp mr-1" id="edit"  data-id="{{ $coupon->id }}" data-toggle="modal" data-target="#editcategory"><i class="fa fa-pencil"></i></a>
                                        <a id="" href="{{ route('coupon.delete', ['id'=>$coupon->id]) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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

    {{-- add category modal******* --}}
    <div class="modal fade" id="addbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('coupon.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Coupon Name</label>
                                <input type="text" class="form-control" @required(true) name="coupon_name" placeholder="Entire Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Type</label>
                                <select class="form-control" name="coupon_type" id="">
                                    <option value="1">Persentage</option>
                                    <option value="2">Solid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Ammount</label>
                                <input class="col-sm-12 col-form-label form-control" required type="text" type="text"   name="coupon_ammount" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Validity</label>
                                <input class="col-sm-12 col-form-label form-control" type="date" name="coupon_validity" id="">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('body').on('click', '#edit', function(){
            let brand_id=$(this).data('id');
            $.get("brand/brand-edit/"+brand_id, function(data){
                $('#modal_body').html(data);
            });
        });
    </script>
@endsection

