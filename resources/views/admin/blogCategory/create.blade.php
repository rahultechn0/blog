@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- @dd($sliders); --}}
                            <form action="{{ route('blog.category.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                {{-- <input type="hidden" value="{{ $sliders->id }}"> --}}
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="blog_cate" type="text"
                                            value="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
