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

                            <form action="{{ route('slider.store',$sliders->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="hidden" value="{{ $sliders->id }}"> --}}
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $sliders->title }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control ckeditor" name="description" type="text"
                                        value = "{{ $sliders->description }}">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="video" value="{{ $sliders->video }}" class="form-control">
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
                                            src="{{ !empty($sliders->image) ? asset('upload/slider/'.$sliders->image): asset('upload/no_image.png') }}" alt="slider image">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#imageUpload').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imageShow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('.ckeditor').ckeditor();
            });
        </script>

    @endsection

@endsection
