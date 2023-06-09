@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Category</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Edit Category
        </div>
        <div class="card-body">
            <form action="{{route('admin.category.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name',$data->name)}}" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Notes</label>
                            <textarea name="notes" id="" class="form-control" cols="30" rows="10">{{old('notes',$data->notes)}}</textarea>
                            @error('notes')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                  

                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Image</label>
                            <input type="file" name="img" value="{{old('img',$data->img)}}" id="choose-file" class="form-control" >
                            @error('img')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="img-preview"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('uploads/categories/'.$data->img)}}" style="width: 300px;" alt="">
                            </div>
                        </div>
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
