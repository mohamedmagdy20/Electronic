@extends("user.layouts.app")
@section('user-content')
<section class="profile container pt-3 pb-3">
    <div class="text-center">
        <div class="img-profile p-3">
            <img src="{{asset('uploads/clients/'.auth()->user()->img)}}" alt="">
        </div>
        <div class="profile-details">
            <div class="profile-email">{{auth()->user()->name}}</div>
            <div class="profile-email">{{auth()->user()->email}}</div>
            <div class="profile-email">{{auth()->user()->phone}}</div>
            <div class="profile-email">{{auth()->user()->address}}</div>
       
            {{-- <div><a href="{{url("user/editprofile/$profile->id")}}" class="btn btn-secondary">Update Profile</a></div> --}}
        </div>
    </div>

    <table class="table mt-5">
        <thead class="table tablehead text-white">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Img</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Date Approve</th>
            </tr>
        </thead>
        <tbody>
        @if (! $data->isEmpty())
          @foreach ($data as $index => $item )
          <tr class="text-center">
          <th scope="row">{{$index}}</th>
          <th scope="">{{$item->product->name}}</th>
          <th scope="">{{$item->product->priceOut}}</th>
          <th class="imgrow"><img  src="{{asset("uploads/products/".$item->product->images[0]->img)}}" alt="Img"></th>
          <th scope="">{{$item->order->address}}</th>
          <th scope="">{{$item->order->phone}}</th>
          <th scope="">{{$item->created_at}}</th>  
        </tr>
        @endforeach
        @else
        <div class="text-center fs-4 fw-bold text-black pt-3 ">Empty &#x1F615;</div>
        @endif  
        </tbody>
      </table>
</section>
@endsection
