<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Electronic</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
   
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            #img-preview {
              display: none; 
              width: 155px;   
              border: 2px dashed #333;  
              margin-bottom: 20px;
            }
            #img-preview img {  
              width: 100%;
              height: auto; 
              display: block;   
            }
          </style>
        @yield('css')
    </head>
    <body class="sb-nav-fixed">
      @include('admins.layouts.nav')
        <div id="layoutSidenav">
            @include('admins.layouts.sidebar') 
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                    @include('admins.layouts.footer')
                </main>
              </div>
      
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.delete-confirm').on('click', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
        
        </script>

        <script>
            const chooseFile = document.getElementById("choose-file");
            const imgPreview = document.getElementById("img-preview");
            chooseFile.addEventListener("change", function () {
              getImgData();
            });
        
            function getImgData() {
              const files = chooseFile.files[0];
              if (files) {
                const fileReader = new FileReader();
                    fileReader.readAsDataURL(files);
                    fileReader.addEventListener("load", function () {
                  imgPreview.style.display = "block";
                  imgPreview.innerHTML = '<img src="' + this.result + '" />';
                });    
              }
            }
          </script>

        @yield('js')    
    </body>
</html>
