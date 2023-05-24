<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('user/style/user-style.css')}}">
    <link rel="stylesheet" href="{{asset('user/style/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/style/swipper.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <script src="{{asset('user/js/font.js')}}"></script>

    <title>Home</title>
</head>
<body>
  @include('user.layouts.header')
  @yield('user-content')

    <script src="{{asset('user/style/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('user/js/jquery-3.4.1.min.js')}}"></script>   
    <script src="{{asset('user/js/script.js')}}"></script>   
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
      
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

    <script>
      var route = {{url('user/Search')}};
         $('#search').typeahead({
             source: function (terms, process) {
                 return $.get(route, {
                     terms: terms
                 }, function (data) {
                     return process(data);
                 });
             }
         });
   </script>
</body>
</html>