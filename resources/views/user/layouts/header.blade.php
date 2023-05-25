<div class="navigation">
    <div class="above-navbar">
        <ul>
             <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
            @if (auth('client')->user())
            <li><a href="{{url('user/profile')}}" class="open-login"><i class="fa fa-user"></i></a></li>
            <li><a href="{{route('client.logout')}}" class=" btn  btn-sm">logout</a></li>  
            @else
            <li><a href="{{route('login')}}" class=" btn  btn-sm">login</a></li>  
            <li><a href="{{route('register')}}" class=" btn  btn-sm">Sign Up</a></li>  
          
            @endif

            
        </ul>
    </div>
    <div class="main-nav row align-items-center text-center  ">
      <div class="nav-logo col-lg-4">
        <a href="{{route('home')}}">
        <img src="{{asset('user/images/logo.webp')}}" alt="">
      </a>
      </div>
      <div class="nav-search col-lg-4">
        <form action="{{route('search.products')}}" method="POST" class="d-flex">
          @csrf
          <input type="text" id="search" name="name" class="form-control me-2 typeahead" placeholder="Search Product">
          <input type="submit" class="btn btn-outline-danger" value="Search">
        </form>
      </div>
      <div class="nav-cart col-lg-4 text-left">
        @if (auth('client')->user())
        <a href="{{route('cart')}}"><i class="fa fa-cart-plus"></i><span>{{auth('client')->user()->cart->count()}}</span></a>
        @endif
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars text-danger"></i>
          <span>Menu</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('all.products')}}">Shop</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('new.products')}}">New Products</a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#note">Send Note</a> 
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @foreach ($cats as $cat)
              <li><a class="dropdown-item" href="{{route('product.category',$cat->id)}}">{{$cat->name}}</a></li>    
              @endforeach
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
