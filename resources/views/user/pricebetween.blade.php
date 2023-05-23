@extends("user.layouts.app")
  @section('user-content')
  <section id="products" class="">
    <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="prod-category text-left">
          <ul>
            <p>Categories</p>
            @foreach ($cats as $cat)
            <li><a class="" href="{{url("user/category/$cat->catId")}}">{{$cat->catName}}</a></li>    
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="items position-relative">
          <div class="row">
            @foreach ($prods as $prod)
            <div class="col-lg-4 col-md-6">
                <a href="{{url("user/product/$prod->prodId")}}" class="text-decoration-none">
                <div class="item text-center shadow p-3 mb-5 bg-white rounded">
                  <div class="item-img ">
                    <img src="{{url("uploads/$prod->prodImg")}}" alt="">
                  </div>
                  <div class="item-body">
                    <div class="item-body-text m-2">
                    <span>{{$prod->catName}}</span>
                    <div class="fs-5 pb-2 pt-3">{{$prod->prodName}}</div>
                    <div class="fs-6  pb-2"> ${{$prod->priceOut}} </div>
                  </div>
                  </div>
                </div>
              </a>
              </div>
            @endforeach
          </div>
          {{-- <div class="text-center">{{$prods->onEachSide(1)->links()}}</div> --}}
    
        </div>
      </div>
    
    </div>
  </div>
  </section>
  @endsection