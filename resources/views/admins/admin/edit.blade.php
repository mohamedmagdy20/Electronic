@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Edit Users</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Edit Users
        </div>
        <div class="card-body">
            <form action="{{route('admin.admins.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name',$data->name)}}" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="{{old('email',$data->email)}}" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="******">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="******">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Image</label>
                            <input type="file" name="img" value="{{old('img')}}" id="choose-file" class="form-control" >
                            @error('img')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="img-preview"></div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
