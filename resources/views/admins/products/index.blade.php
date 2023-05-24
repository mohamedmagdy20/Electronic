@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Products</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Products</a>
            
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
     
            Products
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price In</th>
                        <th>Price Out</th>
                        <th>Category</th>

                        <th>description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>{{$d->priceIn}}</td>
                            <td>{{$d->priceOut}}</td>
                            <td>{{$d->category->name}}</td>
                            <td>{{$d->description}}</td>

                            <td>
                                <div class="py-1">
                                    <img src="{{$d->images[0]->img ? asset('uploads/products/'.$d->images[0]->img) : asset('admin/profile.png')}}" style="width:50px" alt="image" />
                                </div>
                            </td>
                            <td>
                                <a href="{{route('admin.product.edit',$d->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.product.delete',$d->id)}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
