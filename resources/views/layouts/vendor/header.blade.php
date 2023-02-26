<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Toovem</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="title" content="Toovem">
<meta name="author" content="Toovem">
<link rel="canonical" href="Toovem">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="Toovem.co.in">
<meta property="og:title" content="Toovem Dashboard">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="Toovem">
<meta property="twitter:title" content="Toovem Dashboard">
<meta property="twitter:description" content="Toovem content.">
<meta property="twitter:image" content="twitter.jpg">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="32x32" href="{{asset('vendor/assets/img/favicon/favicon.png')}}">

<!-- Fontawesome -->
<link type="text/css" href="{{asset('vendor/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('vendor/css/volt.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('vendor/css/app.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('vendor/css/fileinput.css')}}" rel="stylesheet">
<link type="text/css" href="{{asset('vendor/css/font-awesome.min.css')}}" rel="stylesheet">
{{-- <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="{{asset('vendor/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.js"></script>

</head>

<body>

<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
    <a class="navbar-brand me-lg-5" href="{{route('vendor.home')}}">
        <img class="navbar-brand-dark" src="{{asset('vendor/assets/img/brand/light.svg')}}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{asset('vendor/assets/img/brand/dark.svg')}}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-md-block bg-blue text-white collapse" data-simplebar>
    <span class="sidebar-icon logoadmin">
    <img src="{{asset('vendor/assets/img/logo.png')}}" alt="sms Logo">
    </span>
    <div class="sidebar-inner">

        <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        <div class="d-flex align-items-center">
            <div class="user-avatar lg-avatar me-4">
            <img src="{{asset('vendor/assets/img/team/profile-picture-3.jpg')}}" class="card-img-top rounded-circle border-white"
                alt="Bonnie Green">
            </div>
            <div class="d-block">
            <h2 class="h6">Hi, {{Auth::guard('vendor')->user()->first_name}}</h2>
            <a href="#" class="btn btn-secondary text-dark btn-xs"><span
                class="me-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
            </div>
        </div>
        <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
        </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">

        <li class="nav-item  active ">
            <a href="{{route('vendor.home')}}" class="nav-link">
            <span class="sidebar-icon"><span class="fa fa-tachometer"></span></span>
            <span class="sidebar-text">Dashboard</span>
            </a>
        </li>


        <li class="nav-item ">
            <a href="{{route('vendor.profile')}}" class="nav-link">
            <span class="sidebar-icon"><span class="fa fa-user-circle"></span></span>
            <span class="sidebar-text">My Profile</span>
            </a>
        </li>

            <li class="nav-item">
            <span
            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#Catalog">
            <span>
                <span class="sidebar-icon"><span class="fa fa-tags"></span></span>
                <span class="sidebar-text">Catalog</span>
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
            </span>
            <div class="multi-level collapse " role="list"
            id="Catalog" aria-expanded="false">
            <ul class="flex-column nav">
                {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('vendor.catalog.create')}}">
                    <span class="sidebar-text">Add Catalog</span>
                </a>
                </li>

               <li class="nav-item">
                <a class="nav-link" href="{{route('vendor.catalog')}}">
                    <span class="sidebar-text">View Catalog</span>
                </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{route('vendor.attribute')}}">
                        <span class="sidebar-text">Attributes</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('vendor.products.index')}}">
                        <span class="sidebar-text">Products</span>
                    </a>
                </li>

            </ul>
            </div>
        </li>

        <li class="nav-item">
            <span
            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#Stock">
            <span>
                <span class="sidebar-icon"><span class="fa fa-cubes"></span></span>
                <span class="sidebar-text">Stock</span>
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
            </span>
            <div class="multi-level collapse " role="list"
            id="Stock" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                <a class="nav-link" href="{{route('vendor.inventory')}}">
                    <span class="sidebar-text">Inventories</span>
                </a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="sidebar-text">Warehouses</span>
                </a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="sidebar-text">Suppliers</span>
                </a>
                </li> -->

            </ul>
            </div>
        </li>

        <li class="nav-item ">
            <a href="{{route('vendor.order.index')}}" class="nav-link">
            <span class="sidebar-icon"><span class="fa fa-cart-plus"></span></span>
            <span class="sidebar-text">Orders</span>
            </a>
        </li>

            <li class="nav-item">
                <span
                    class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#Shipping">
                    <span>
                    <span class="sidebar-icon"><span class="fa fa-truck"></span></span>
                    <span class="sidebar-text">Shipping</span>
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse " role="list"
                    id="Shipping" aria-expanded="false">
                    <ul class="flex-column nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-text">Carriers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-text">Packaging</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('vendor.shipping')}}">
                        <span class="sidebar-text">Shipping Zones</span>
                        </a>
                    </li>

                    </ul>
                </div>
            </li>

            <!-- <li class="nav-item ">
                <a href="#" class="nav-link">
                    <span class="sidebar-icon"><span class="fa fa-paper-plane"></span></span>
                    <span class="sidebar-text">Promotions</span>
                </a>
            </li> -->

            <!-- <li class="nav-item ">
                <a href="#" class="nav-link">
                    <span class="sidebar-icon"><span class="fa fa-futbol-o"></span></span>
                    <span class="sidebar-text">Support Desk</span>
                </a>
            </li> -->

            <!-- <li class="nav-item">
                    <span
                    class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#Settings">
                    <span>
                        <span class="sidebar-icon"><span class="fa fa-cog"></span></span>
                        <span class="sidebar-text">Settings</span>
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                    </span>
                    <div class="multi-level collapse " role="list"
                    id="Settings" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-text">User Roles</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-text">Taxes</span>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-text">General Config</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-text">Configuration</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-text">Payment Methods</span>
                        </a>
                        </li>

                    </ul>
                    </div>
            </li> -->

            <!-- <li class="nav-item ">
                <a href="#" class="nav-link">
                <span class="sidebar-icon"><span class="fa fa-map-o"></span></span>
                <span class="sidebar-text">Reports</span>
                </a>
            </li> -->

            <li class="nav-item">
                <span
                class="nav-link   d-flex justify-content-between align-items-center">
                <span>
                    <span class="sidebar-icon"><span class="fa fa-sign-out"></span></span>
                    <a class="logout" href="{{route('vendor.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="sidebar-text">Logout</span></a>
                    <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST"
                                style="display: none;">{{ csrf_field() }}
                    </form>
                </span>

                </span>

            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between selopaw" id="navbarSupportedContent">
        <div class="d-flex align-items-center">
          <!-- Search form -->
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon"><span class="fas fa-search"></span></span>
                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
            </div>
          </form>
        </div>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark me-lg-3 icon-notifications dropdown-toggle" data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon icon-sm">
                <span class="fas fa-bell bell-shake"></span>
                <span class="icon-badge rounded-circle unread-notifications"></span>
              </span>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-lg dropdown-menu-center mt-2 py-0">
              <div class="list-group list-group-flush">
                <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>




                <a href="#" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{asset('vendor/assets/img/team/profile-picture-5.jpg')}}" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col ps-0 ms-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">{{Auth::guard('vendor')->user()->name}}</h4>
                            </div>
                            <div class="text-end">
                              <small>2 hrs ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">New message: "We need to improve the UI/UX for the landing page."</p>
                      </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item text-center text-primary fw-bold rounded-bottom py-3">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="media d-flex align-items-center">
                    @if(Auth::guard('vendor')->user()->image!=NULL)
                        <img class="user-avatar md-avatar rounded-circle" alt="Image placeholder" src="{{asset('uploads/vendor/profile/'.Auth::guard('vendor')->user()->image)}}">
                    @else
                        <img class="user-avatar md-avatar rounded-circle" alt="Image placeholder" src="{{asset('vendor/assets/img/profile-default-avtar.jpg')}}">
                    @endif
                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                  <span class="mb-0 font-small fw-bold">{{Auth::guard('vendor')->user()->name}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-0">
                <a class="dropdown-item rounded-top fw-bold" href="{{route('vendor.profile')}}"><span class="far fa-user-circle"></span>My Profile</a>
                <a class="dropdown-item fw-bold" href="#"><span class="fas fa-cog"></span>Settings</a>
                <a class="dropdown-item fw-bold" href="#"><span class="fas fa-envelope-open-text"></span>Messages</a>
                <a class="dropdown-item fw-bold" href="#"><span class="fas fa-user-shield"></span>Support</a>
                <div role="separator" class="dropdown-divider my-0"></div>
                <a class="dropdown-item rounded-bottom fw-bold " href="{{route('vendor.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form1').submit();"><span class="fas fa-sign-out-alt text-danger"></span>Logout</a>
                <form id="logout-form1" action="{{ route('vendor.logout') }}" method="POST"
                            style="display: none;">{{ csrf_field() }}
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>
