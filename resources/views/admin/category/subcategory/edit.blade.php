<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form action="{{ route('subcategory-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-sm-3 col-form-label">Category Name</label>
        </div>
        <div class="col-md-8">
            <div class="input-group mb-3 ">
                <select class="form-control" id="inlineFormCustomSelect" name="category_id">
                    <option selected disabled value="12">Select A Category...</option>
                    <option selected hidden value="12"> Category...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id==$subcategory->category_id)
                            @selected(true)
                        @endif>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-sm-3 col-form-label">Subcategory Name</label>
            <input type="hidden" name="id" value="{{ $subcategory->id }}">
        </div>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="subcategory_name"
                value="{{ $subcategory->subcategory_name }}">
        </div>
    </div>
    @if($subcategory->subcategory_image)
    <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <img style="height: 100px; widows: 100px;" src="{{ asset('public/files/subcategory/'.$subcategory->subcategory_image) }}" alt="">
        </div>
    </div>
    @endif
    <div class="form-group row">
        <div class="col-md-12">
            <input class="dropify" type="file" value="{{ $subcategory->subcategory_image }}" name="subcategory_image" id="" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Add New">
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
