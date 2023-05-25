
  @extends("user.layouts.app")
  @section('user-content')
  @if(Session::has('success'))
  <div id="success" class="text-center fs-4 alert alert-success">
      {{Session::get('success')}}
  </div>
@endif
  <div class="category-content row m-auto container pt-5 pb-5">
    <h2><span>Our</span> Collections</h2>
    @foreach($cats as $cat)
      <div class="col-lg-4 col-md-6">
        <div class="content">
          <a class="text-decoration-none" href="{{route('product.category',$cat->id)}}">
          <div class="content-color"></div>
          <div class="content-img text-center">
            <img class="img-fluid" src="{{asset("uploads/categories/$cat->img")}}" alt="">
          </div>
          <div class="content-body">
            <h3>{{$cat->name}}<br>Collection</h3>
            <a href="{{route('product.category',$cat->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="shop-now mt-5">
    <div class="shop-body">
        <p class="shop-head">HOT DEAL THIS WEEK</p>
        <p>NEW COLLECTION UP TO 50% OFF</p>
        <a class="btn btn-danger" href="{{route('all.products')}}">Shop Now</a>
    </div>
  </div>
  <div id="new" class="swiper mySwiper">
    <h2 class="text-center pt-5 pb-5"><span class="text-danger">New </span>Products</h2>
    <div class="swiper-wrapper">
      @foreach ( $products as $prod )
      <div class="swiper-slide">
       <a class="text-decoration-none" href="">
        <div class="product text-center">
          <div class="prod-img">
            <img src="{{asset('uploads/products/'.$prod->images[0]->img)}}" alt="" />
          </div>
          <div class="prod-body pt-4">
            <h3 class="text-dark">{{$prod->name}}</h3>
            <h5 class="text-dark">Price: <span class="text-danger">${{$prod->priceIn}}</span></h5>
            <a href="{{route('show.product',$prod->id)}}" class="btn btn-danger">View</a>
          </div>
        </div>
      </a>
      </div>
      @endforeach
    <div class="swiper-pagination"></div>

    </div>
  </div> 
  
  <div id="note" class="comp p-2">
    <div class="container">
    <div class="fs-4 fw-bold pb-3 pt-4"> <span class="text-danger">Send</span> a Message</div>
    <div>
      <form action="{{url('user/storecomplements')}}" method="POST">
        @csrf
        <textarea name="com" class="form-control" id="" cols="30" rows="10"></textarea>
        <button type="submit" class="btn btn-danger mt-2">Submit</button>
      </form>
    </div>
  </div>
  </div>
 
  @endsection
</body>
</html>
