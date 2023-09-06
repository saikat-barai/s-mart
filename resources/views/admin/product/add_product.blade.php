@extends('admin.maser')
@section('content_body')
    <div class="col-lg-12">
        <div class="card bgl-dark">
            <div class="card-header text-lg-center bg-dark">
                <h3 class="m-auto" style="color: rgb(63, 60, 60)"><strong>Add Product</strong></h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Select Category</label>
                                <select class="form-control category" name="category_id" id="">
                                    <option value="">Select A Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Select SubCategory</label>
                                <select name="subcategory_id" class="form-control subcategory" id="">
                                    <option value="">Select A SubCategory</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Select ChildCategory</label>
                                <select name="childcategory_id" class="form-control childcategory" id="">
                                    <option value="">Select A ChildCategory</option>
                                    @foreach ($childcategories as $childcategory)
                                        <option value="{{ $childcategory->id }}">{{ $childcategory->childcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Product Name</label>
                                <input class="form-control" type="text" name="product_name" id="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Select Brand</label>
                                <select name="brand_id" class="form-control" id="">
                                    <option value="">Select A Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Tags</label>
                                <input type="text" id="input-tags" name="tags" placeholder="Add Tags" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Regular Price</label>
                                <input class="form-control" type="text" name="price" id="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Discount Price</label>
                                <input class="form-control" type="text" name="discount_price" id="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Short Description</label>
                                <input type="text" class="form-control" name="short_description" id="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Long Description</label>
                                <textarea class="form-control" name="long_description" id="summernote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Additional Information</label>
                                <textarea class="form-control" name="additional_information" id="summernote2" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Preview</label>
                                <input type="file" name="preview" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Thumbnail Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5 m-auto">
                            <div class="mb-3">
                                <label for="" class="form-label"></label>
                                <input type="submit" class="btn btn-primary w-100" value="Add Product">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer_content')
    <script>
        $("#input-tags").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.category_search').select2();
            $('.subcategory_search').select2();
        });
    </script>
    <script>
        $('.category').change(function() {
            var category_id = $(this).val();
                        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'{{ url('product/getsubcategory') }}',
                data:{'category_id':category_id},
                success:function(data){
                    $('.subcategory').html(data);
                }
            });
        });
    </script>
    <script>
        $('.subcategory').change(function(){
            var subcategory_id = $(this).val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'post',
                url:'{{ url('product/getchildcategory') }}',
                data:{'subcategory_id':subcategory_id},
                success:function(data){
                    $('.childcategory').html(data);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#summernote2').summernote();
        });
    </script>
@endsection
