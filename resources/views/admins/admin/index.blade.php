@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{route('admin.admins.create')}}" class="btn btn-primary">Add Admins</a>
            
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin )
                        <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>
                                <div class="py-1">
                                    <img src="{{$admin->img ? asset('uploads/users/'.$admin->img) : asset('admin/profile.png')}}" style="width:50px" alt="image" />
                                </div>
                            </td>
                            <td>
                                <a href="{{route('admin.admins.edit',$admin->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.admins.delete',$admin->id)}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
