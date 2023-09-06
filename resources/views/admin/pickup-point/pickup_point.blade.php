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
                    <h4 class="card-title">All Pickup Point</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a data-toggle="modal" data-target="#addpickuppoint" href="" class="btn btn-secondary">+Add New</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone One</th>
                                <th>Phone Two</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pickuppoints as $key=>$pickuppoint)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $pickuppoint->pickup_name }}</td>
                                <td>{{ $pickuppoint->pickup_address }}</td>
                                <td>{{ $pickuppoint->pickup_phone_one }}</td>
                                <td>{{ $pickuppoint->pickup_phone_two }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-primary shadow btn-xs sharp mr-1" id="edit"  data-id="{{ $pickuppoint->id }}" data-toggle="modal" data-target="#editcategory"><i class="fa fa-pencil"></i></a>
                                        <a id="delete" href="{{ route('pickuppoint-delete', ['id'=>$pickuppoint->id]) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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

    {{-- add pickuppoint modal******* --}}
    <div class="modal fade" id="addpickuppoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Pickup Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pickuppoint-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Pickup's Name</label>
                                <input type="text" class="form-control" name="pickup_name" placeholder="Entire Warehouse Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Pickup's Address</label>
                                <input type="text" class="form-control" name="pickup_address" placeholder="Entire Warehouse Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Phone One</label>
                                <input type="text" class="form-control"  name="pickup_phone_one" placeholder="Entire Warehouse Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Phone Two</label>
                                <input type="text" class="form-control"  name="pickup_phone_two" placeholder="Entire Warehouse Phone">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pickup Point</h5>
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
            let pickuppoint_id=$(this).data('id');
            $.get("pickuppoint/pickuppoint-edit/"+pickuppoint_id, function(data){
                $('#modal_body').html(data);
            });
        });
    </script>
@endsection

