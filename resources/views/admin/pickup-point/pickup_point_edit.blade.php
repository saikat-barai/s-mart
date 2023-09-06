<form action="{{ route('pickuppoint-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $pickuppoint->id }}">
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Pickup's Name</label>
            <input type="text" class="form-control" name="pickup_name" placeholder="Entire Warehouse Name" value="{{ $pickuppoint->pickup_name }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Pickup's Address</label>
            <input type="text" class="form-control" name="pickup_address" placeholder="Entire Warehouse Address" value="{{ $pickuppoint->pickup_address }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Phone One</label>
            <input type="text" class="form-control"  name="pickup_phone_one" placeholder="Entire Warehouse Phone" value="{{ $pickuppoint->pickup_phone_one }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Phone Two</label>
            <input type="text" class="form-control"  name="pickup_phone_two" placeholder="Entire Warehouse Phone" value="{{ $pickuppoint->pickup_phone_two }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Add New">
        </div>
    </div>
</form>