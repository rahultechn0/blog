@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page </h4><br><br>

                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif

                            <form method="POST" action="{{ route('passwordUpdate') }}">
                                @csrf

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">OldPassword</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="oldpassword" type="password"
                                            value="{{ old('oldpassword') }}">
                                        {{-- @error('oldpassword')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror --}}

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="newpassword" type="password"
                                            value="{{ old('newpassword') }}">
                                        {{-- @error('newpassword')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="confirm_password" type="password"
                                            value="{{ old('confirm_password') }}">
                                        {{-- @error('confirm_password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror --}}
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

@endsection
