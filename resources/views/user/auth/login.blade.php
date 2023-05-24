<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('user/style/auth.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			{{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #01</h2>
				</div>
			</div> --}}
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Login In</h3>
						<form action="{{route('login')}}" method="POST" class="login-form">
                            @csrf
		      		<div class="form-group">
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Enter Email" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-danger rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-danger">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								{{-- <div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div> --}}
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	{{-- <script src="{{asset('user/js/auth/jquery.min.js')}}"></script> --}}
  <script src="{{asset('user/js/auth/popper.js')}}"></script>
  <script src="{{asset('user/js/auth/bootstrap.min.js')}}"></script>
  <script src="{{asset('user/js/auth/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script>

	</body>
</html>

