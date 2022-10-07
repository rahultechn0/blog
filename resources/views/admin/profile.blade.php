@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <br><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ !empty($userData->image) ? asset('upload/adminProfile/'.$userData->image): asset('upload/no_image.png') }}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-text">Name: {{$userData->name}}</h4>
                        <h4 class="card-text">Email: {{$userData->email}}</h4>
                        <h4 class="card-text">UserName: {{$userData->username}}</h4>
                        <a href="{{ route('profileEdit') }}" class="btn btn-primary waves-effect waves-light">Edit</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

            </div>

        </div>

    </div>
</div>

@endsection
