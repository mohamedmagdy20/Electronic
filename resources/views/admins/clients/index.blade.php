@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Clients</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Clients</li>
    </ol>
   
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Clients
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>
                                <div class="py-1">
                                    <img src="{{$d->img ? asset('uploads/clients/'.$d->img) : asset('admin/profile.png')}}" style="width:50px" alt="image" />
                                </div>
                               
                            </td>
                            <td>{{$d->phone}}</td>

                            <td>{{$d->email}}</td>
                            
                            <td>{{$d->address}}</td>
                            
                            <td>
                                <a href="{{route('admin.clients.delete',$d->id)}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
