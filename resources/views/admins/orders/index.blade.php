@extends('admins.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Orders</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Orders
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                        <tr>
                            <td>{{$d->code}}</td>
                            <td>{{$d->client->name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->address}}</td>
                            <td>{{$d->type}}</td>
                            <td>
                                @if ($d->status == 'pending')
                                    <a href="{{route('admin.orders.approve.order',$d->id)}}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                    <a href="{{route('admin.orders.cencel.order',$d->id)}}" class="btn btn-danger">X</a>
                                @elseif ($d->status == 'cencel')
                                <p class="btn btn-danger">Cencel</p>
                                @elseif ($d->status == 'recived')
                                    <p class="btn btn-success">Recieved</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.orders.show.order',$d->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
