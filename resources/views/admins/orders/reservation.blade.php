@extends('admins.layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Order : {{$data->code}}</h3>
            <div class="card">
                <div class="card-body p-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th colspan="2" class="text-center">Customer</th>
                        </tr></thead>
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{$data->client->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$data->client->email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Phone</th>
                            <td>{{$data->phone}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Address</th>
                            <td>{{$data->address}}</td>
                          </tr>
                          <tr>
                            <th scope="row">{{$data->created_at}}</th>
                          </tr>
                          <tr>
                            <th scope="row">Status</th>
                            <td>{{$data->statue}}</td>
                          </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($data->order_details as $prod )
                            <tr>
                            <td>{{$prod->product->name}}</td>
                            <td>{{$prod->count}}</td>
                            <td>{{$prod->product->priceOut}}</td>
                        </tr>
                         @endforeach
                       
                          
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>${{$data->total}}</td>
                          
                          </tr>
                        </tbody>
                    </table>

                    <a class="btn btn-dark" href="{{route('admin.orders.index')}}">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection