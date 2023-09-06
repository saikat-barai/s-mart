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
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-auto">SEO SETTING</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" placeholder="Entire Meta Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Meta Author</label>
                                <input type="text" class="form-control" placeholder="Inture Author">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Meta Tag</label>
                                <input  type="text" class="form-control" placeholder="Tag">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Meta Keyword</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" id="summernote">
                            </div>
                            <div class="form-group col-md-12">
                                <strong style="color: green">-----Other Option-----</strong>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Google Verification</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alexa Verification</label>
                                <input type="text" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label></label>
                                <input class="btn btn-primary btn-block" type="submit" value="Update Seo Setting">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- add category modal******* --}}
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Category Name</label>
                                <input type="text" class="form-control" @required(true) name="category_name" placeholder="Entire Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class=" col-form-label">Image</label>
                                <input class="col-sm-12 col-form-label dropify" type="file" name="category_image" id="">
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
            let category_id=$(this).data('id');
            $.get("category/category-edit/"+category_id, function(data){
                $('#modal_body').html(data);
            });
        });
    </script>
@endsection

