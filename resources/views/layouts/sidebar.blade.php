<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa solid fa-marker"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MIMIE <sup>STORE</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('barang.index') }}">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                    <span>Barang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('detail.index') }}">
                    <i class="fa fa-clipboard-check fa-2x "></i>
                    <span>Detail</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('konsumen.index') }}">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <span>Konsumen</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pembayaran.index') }}">
                    <i class="fas fa-money-bill-wave fa-2x"></i>
                    <span>Pembayaran</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

             <!-- Nav Item - Pages Collapse Menu -->
             <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>For Login</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{ route('login') }}">Login</a>
                        <a class="collapse-item" href="{{ route('register') }}">Register</a> -->
                        <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a> -->
                        <!-- <div class="collapse-divider"></div> -->

            <!-- Sidebar Message
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>