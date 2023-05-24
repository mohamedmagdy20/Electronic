<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('user/style/auth.css')}}">

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
		      	<h3 class="text-center mb-4">Register</h3>
						<form action="{{route('register')}}" method="POST" class="login-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-left" name="name" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-left" name="email" placeholder="Enter Email" required>
                                    </div>
                                </div>

                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-left" name="phone" placeholder="Enter Phone" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex">
                                        <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group d-flex">
                                        <input type="password" name="password_confirmation" class="form-control rounded-left" placeholder="Password Confirmation" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex">
                                        <input type="text" name="address" class="form-control rounded-left" placeholder="Enter Address" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex">
                                        <input type="file" name="img" class="form-control rounded-left" placeholder="Enter Image" required>
                                    </div>
                                </div>


                            </div>
		      	
	         
	                        <div class="form-group">
	                        	<button type="submit" class="form-control btn btn-danger rounded submit px-3">Register</button>
	                        </div>
	                        <div class="form-group d-md-flex">
	                        </div>
	                </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('user/js/auth/jquery.min.js')}}"></script>
  <script src="{{asset('user/js/auth/popper.js')}}"></script>
  <script src="{{asset('user/js/auth/bootstrap.min.js')}}"></script>
  <script src="{{asset('user/js/auth/main.js')}}"></script>

	</body>
</html>

