@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}">Product</a></li>
        <li class="breadcrumb-item active">Add Product</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Add Product
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Category</label>
                            <select name="category_id" class="form-control" id="">
                                @foreach ($cats as $cat )
                                    <option value="{{old('category_id',$cat->id)}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Price In</label>
                            <input type="number" name="priceIn" value="{{old('priceIn')}}" class="form-control" placeholder="Enter Price In">
                            @error('priceIn')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <div class="from-group">
                            <label for="name">Price Out</label>
                            <input type="number" name="priceOut" value="{{old('priceOut')}}" class="form-control" placeholder="Enter Price Out">
                            @error('priceOut')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <label for="name">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>

                  

                    <div class="col-md-12 mb-3">
                        <div class="from-group">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                  <label class="upload__btn">
                                    <p>Upload images</p>
                                    <input type="file" multiple="" name="images[]" data-max_length="20" class="upload__inputfile">
                                  </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                              </div>
                            @error('images')
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
