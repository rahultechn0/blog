@extends('admin.admin_master')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
@endsection
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                    <div class="col-sm-10">
                                        <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                            @foreach ($blogData as $item)
                                            <option value="{{$item->id }}">{{ $item->blog_cate }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text" value="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="tags" type="text" value="php,jquery">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control ckeditor" name="description" cols="5" rows="2">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="imageUpload" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-xl" id="imageShow"
                                            src="{{ !empty($about->image) ? asset('upload/blog/'.$about->image): asset('upload/no_image.png') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.ckeditor').ckeditor();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#imageUpload').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imageShow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>


    @endsection
    @endsection

