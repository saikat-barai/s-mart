<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form action="{{ route('category-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Category Name</label>
        <input type="hidden" name="id" value="{{ $category->id }}">
        <input type="hidden" name="old_image" value="{{ $category->category_image }}">
        <div class="col-sm-9">
            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
        </div>
    </div>
    @if($category->category_image)
    <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <img style="height: 100px; widows: 100px;" src="{{ asset('public/files/category/'.$category->category_image) }}" alt="">
        </div>
    </div>
    @endif
    <div class="form-group row">
        <div class="col-md-12">
            <input class="dropify" type="file" value="" name="category_image" id="" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
