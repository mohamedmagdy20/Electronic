<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="{{route('admin.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>


                <a class="nav-link" href="{{route('admin.admins.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Admins
                </a>

                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-tablet"></i></div>
                    Categories
                </a>
               
                
                <a class="nav-link" href="{{route('admin.product.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-tablet"></i></div>
                    Products
                </a>


                <a class="nav-link" href="{{route('admin.clients.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                    Clients
                </a>


                
                <a class="nav-link" href="{{route('admin.orders.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-tablet"></i></div>
                    Orders
                </a>
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>