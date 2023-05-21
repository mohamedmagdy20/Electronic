@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Category</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>
            
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Categories
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Notes</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>{{$d->notes}}</td>
                            <td>
                                <div class="py-1">
                                    <img src="{{$d->img ? asset('uploads/category/'.$d->img) : asset('admin/profile.png')}}" style="width:50px" alt="image" />
                                </div>
                            </td>
                            <td>
                                <a href="{{route('admin.category.edit',$d->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.category.delete',$d->id)}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
