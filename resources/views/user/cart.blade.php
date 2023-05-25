@extends("user.layouts.app")
@section('user-content')
<section class="Carts">
    <div class="container">
        @if(Session::has('success'))
        <div id="success" class="text-center fs-4 alert alert-success">
            {{Session::get('success')}}
        </div>
      @endif
    <div class="cart d-flex justify-content-around align-items-center mt-4 mb-3 shadow p-3 mb-5 rounded">
        <div class="cart-total d-flex justify-content-center">
            <div class="pe-2">Total: </div>
            <div>${{ $total}}</div>
        </div>
        <div class="cart-total d-flex justify-content-center">
            <div class="pe-2">Cart:</div>
            <div>{{$cartCount}}</div>
        </div>
    </div>
    {{-- @foreach ($carts as $item )
        <p>{{$item->prodName}}</p>    
    @endforeach --}}
    <table class="table">
        <thead class="table tablehead text-white">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Img</th>
                <th scope="col">Delete</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $item )
          <tr class="text-center">
          <th scope="row">{{$index+1}}</th>
          <th scope="">{{$item->product->name}}</th>
          <th scope="">{{$item->product->priceOut}}</th>
          <th scope="">{{$item->count}}</th>
          <th class="imgrow"><img  src="{{asset('uploads/products/'.$item->product->images[0]->img)}}" alt="Img"></th>
          <th scope=""><a href="{{route('cart.delete',$item->id)}}" class="delete-confirm"><i class="fas fa-trash text-danger"></i></a></th>     
        </tr>
          @endforeach

        </tbody>
      </table>
    <div class="pt-4 pb-5">
    <form method="POST" action="{{route('store.orders')}}">
        <div class="fs-3 fw-bolder pb-3">Fill Your info</div>
        @csrf
        <label class="mb-2 fw-bold text-danger" for="">Enter Address</label>
        <input type="text" name="address"  class="form-control mb-3" value="{{auth('client')->user()->address}}" placeholder="Address"/>
        @error('address')
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
        <input type="hidden" name="total" value="{{$total}}">
        <label class="mb-2 fw-bold text-danger" for="">Phone</label>
        <input type="text" name="phone" class="form-control mb-3" value="{{auth('client')->user()->phone}}" placeholder="Phone"/>
        @error('phone')
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror

        <label for="">Paymeny Method</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="manual" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              Manual
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="paypal">
            <label class="form-check-label" for="flexRadioDefault2">
              PayPal
            </label>
          </div>

        <button type="submit" class="btn btn-danger">Submit Order</button>
    </form>
</div>
</div>
</section>
@endsection
 