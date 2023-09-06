<form action="{{ route('warehouse-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $warehouse->id }}">
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Warehouse Name</label>
            <input type="text" class="form-control" @required(true) name="warehouse_name" value="{{ $warehouse->warehouse_name }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Warehouse Address</label>
            <input type="text" class="form-control" @required(true) name="warehouse_address" value="{{ $warehouse->warehouse_address }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class=" col-form-label">Warehouse Phone</label>
            <input type="text" class="form-control" @required(true) name="warehouse_phone" value="{{ $warehouse->warehouse_phone }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Add New">
        </div>
    </div>
</form>