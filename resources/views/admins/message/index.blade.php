@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Messages</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Message</li>
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
                        <th>Message</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                        <tr>
                            <td>{{$d->message}}</td>
                            
                            <td>
                                <a href="{{route('admin.messages.delete',$d->id)}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
