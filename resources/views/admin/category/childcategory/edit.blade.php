<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<form action="{{ route('childcategory-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-sm-3 col-form-label">Subcategory Name</label>
        </div>
        @php
            $default = DB::table('subcategories')
                ->latest()
                ->first();
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
                       <option value="{{ $subcategory->id }}" @if ($subcategory->id==$childcategory->subcategory_id)
                           @selected(true)
                       @endif>---{{ $subcategory->subcategory_name }}</option>
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
            <input type="hidden" name="id" value="{{ $childcategory->id }}">
            <input type="text" class="form-control" required name="childcategory_name"
                value="{{ $childcategory->childcategory_name }}">

        </div>
    </div>
   
    <div class="form-group row">
        <label class="col-sm-4 col-form-label"></label>
        <div class="col-sm-8">
            <img style="height: 100px; widows: 100px;" src="{{ isset($childcategory->childcategory_image)? asset('public/files/childcategory/'.$childcategory->childcategory_image): 'public/files/childcategory/defaultphoto/childcategory.png' }}" alt="">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-12">
            <input type="hidden" name="old_image" value="{{ $childcategory->childcategory_image }}">
            <input class="dropify" type="file" name="childcategory_image" id="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
