<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> KHANNA JEWELLERS </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/font-awesome-all.css') }}" rel="stylesheet" />
    <link href="{{ asset('gull/dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resized/jquery.resizableColumns.css') }}" rel="stylesheet" />
    <!-- ============ jquery-dataTables ============= -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <!-- ============ bootstrap-datetimepicker ============= -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    
    <!-- ============ jquery-confirm ============= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.css">
    <!-- ============ jquery-ui ============= -->
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="d-flex align-items-center">
                <div class="search-bar">
                 <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                    <input type="text" placeholder="Search ">
                   
                </div>
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                
                 
                <!-- Grid menu Dropdown -->
                
                
               
                 
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="{{ asset('images/logo-khanna.png') }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }}
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">{{ csrf_field() }}</form>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>


                  
            </div>
        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <?php 

                     $about_us ="";
                     $terms_of ="";
                     $policy ="";

                     ?>
                    @foreach(Session::get('sidemenu') as $t)
                    

                    @if($t['action'] == '/home')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('home')}}"><i class="nav-icon i-Home1"></i>Dashboard</a>
                    </li>
                    @endif
                   <!--  <li class="nav-item parent-menu"><a class="nav-item-hold" href="{{url('users')}}"><i class="nav-icon i-Add-User"></i>Users</a>
                    
                    </li> -->
                    @if($t['action'] =='/roles')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('roles')}}"><i class="nav-icon i-Add-UserStar"></i>Roles</a>
                    </li>
                    @endif

                    @if($t['action'] =='/executives')
                    <li class="nav-item" ><a class="nav-item-hold" href="{{url('executives')}}"><i class="nav-icon i-Business-Mens"></i>Executives</a>
                    </li>
                    @endif
                     <!-- <ul class="childmenu">
                            <li><a href="#">user1</a></li>
                            <li><a href="#">user2</a></li>
                            <li><a href="#">user3</a></li>
                            <li><a href="#">user4</a></li>
                        </ul> -->
                   @if($t['action'] =='/customers')
                    <li class="nav-item "><a class="nav-item-hold" href="{{url('customers')}}"><i class="nav-icon i-Network"></i>Customers</a>
                   
                        
                    </li>
                    @endif
                    @if($t['action'] =='/product_categories')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('product_categories')}}"><i class="nav-icon i-Split-Four-Square-Window"></i>Product-categories</a>
                    </li>
                    @endif
                    @if($t['action'] =='/products')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('products')}}"><i class="nav-icon i-Gift-Box"></i>Products</a>
                    </li>
                    @endif
                    @if($t['action'] =='/appointments')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('appointments')}}"><i class="nav-icon i-Consulting"></i>Appointments</a>
                    </li>
                    @endif
                    @if($t['action'] =='/celebrity_picks')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('celebrity_picks')}}"><i class="nav-icon i-Tag"></i>Celebrity Picks</a>
                    </li>
                    @endif
                    @if($t['action'] =='/meetings')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('meetings')}}"><i class="nav-icon i-Handshake"></i>Meetings</a>
                    </li>
                    @endif
                    @if($t['action'] =='/slider_images')
                    <li class="nav-item"><a class="nav-item-hold" href="{{url('slider_images')}}"><i class="nav-icon i-Tag"></i>Slider Images</a>
                    </li>
                    @endif
                    <?php if($t['action'] =='/about_us')
                    {
                         $about_us = 'about_us';
                    }

                   
                    if($t['action'] =='/terms_of')
                    {
                         $terms_of = 'terms_of';
                    }

                   
                    if($t['action'] =='/policy')
                    {
                         $policy = 'policy';
                    }

                    ?>

                    
                  
                 
                     @endforeach

                     @if($about_us!='' || $terms_of!='' || $policy!='' )
                      <li class="nav-item dropdown"><a class="nav-item-hold dropdown-toggle" data-toggle="dropdown" href="#"><i class="nav-icon i-Network"></i>CMS</a>
                        <ul class="dropdown-menu childmenu">
                             @if($about_us =='about_us')
                            <li><a href="{{url('about_us')}}">About Us</a></li>
                             @endif
                             @if($terms_of =='terms_of')
                            <li><a href="{{url('terms_of')}}">Terms & Condition</a></li>
                             @endif
                             @if($policy =='policy')
                            <li><a href="{{url('policy')}}">Privacy Policy </a></li>
                             @endif
                          </ul>
                    </li>

                    @endif
                   <!--  <li class="nav-item"><a class="nav-item-hold" href="{{url('appointments')}}"><i class="nav-icon i-Home1"></i>Appointments</a>
                    </li> -->
                    
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style type="text/css">
            .childmenu {
                padding: 10px;
                background: #fff;
                transition: all 2s;
                z-index: 999;
                min-width: 130px;
                box-shadow: 0px 0px 4px 1px #ccc;
                }
            .childmenu li {
                list-style-type: none;
                text-align: left;
                font-size: 14px;
                line-height: 25px;
            }
            .childmenu li a{
                color: #666;
            }
           .layout-sidebar-large .main-header {
    position: fixed;
    width: 100%;
    height: 65px;
    z-index: 2;
}
 .layout-sidebar-large .main-header .header-part-right .user img {
        width: 53px!important;
        height: 53px!important;
        border-radius: 50%; }
            

        </style>



        