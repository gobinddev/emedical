<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'E-medical') }} </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/font-awesome-all.css') }}" rel="stylesheet" />
    <link href="{{ asset('gull/dist-assets/css/themes/lite-purple.min.css?ver=1.0') }}" rel="stylesheet" />
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <!--<div class="d-flex align-items-center">-->
            <!--    <div class="search-bar">-->
            <!--     <i class="search-icon text-muted i-Magnifi-Glass1"></i>-->
            <!--        <input type="text" placeholder="Search ">-->

            <!--    </div>-->
            <!--</div>-->
            <div style="margin: auto"></div>
            <div class="header-part-right">


                <!-- Grid menu Dropdown -->

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        {{-- <img src="{{ asset('images/logo-khanna.png') }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                        <h5 class="cursor-pointer" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ config('app.name', 'E-medical') }}</h5>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }}
                            </div>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  style="display: none;">{{ csrf_field() }}</form>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
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
                <img src="{{asset('assets/img/logo.png')}}" hight="150px" width="150px">
                <ul class="navigation-left">
                    <?php

                     $about_us ="";
                     $terms_of ="";
                     $policy ="";

                     $url = '/admin/';
                     //dd(Session::get('sidemenu'));
                     ?>
                    @foreach(Session::get('sidemenu') as $t)

                               
                        @if($t['name'] == 'Vendor Management' || $t['name'] == 'Document Library')
                                @break
                        @elseif(!(stripos($t['action'],'/executives')!==false || stripos($t['action'],'/settings')!==false))
                            <li class="nav-item @if(request()->is($t['action'])) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','',$t['action']))}}"><i class="nav-icon {{$t['icon_class']}}"></i>{{$t['name']}}</a>
                            </li>
                        @endif


                     @endforeach

                     <li class="nav-item @if(request()->is('attribute.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','attribute'))}}"><i class="nav-icon i-Tag"></i>Attribute</a>
                     </li>

                     <li class="nav-item @if(request()->is('blog.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','blog'))}}"><i class="nav-icon i-Tag"></i>Blog</a>
                    </li>

                    <li class="nav-item @if(request()->is('blog-category.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','blog-category'))}}"><i class="nav-icon i-Tag"></i>Blog Category</a>
                    </li>

                    <li class="nav-item @if(request()->is('order.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','order'))}}"><i class="nav-icon i-Tag"></i>Order</a>
                    </li>

                    <li class="nav-item @if(request()->is('testimonial.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','testimonial'))}}"><i class="nav-icon i-Tag"></i>Testimonial</a>
                    </li>

                    <!--<li class="nav-item @if(request()->is('contact_us*')) active @endif"><a class="nav-item-hold" href="{{url($url.'contact_us')}}"><i class="nav-icon i-Internet"></i>Contact Us</a>-->
                    <!--</li>-->

                    <!--<li class="nav-item @if(request()->is('community*')) active @endif"><a class="nav-item-hold" href="{{url($url.'community')}}"><i class="nav-icon i-Internet"></i>Community</a>-->
                    <!--</li>-->

                    <!--<li class="nav-item @if(request()->is('academy.*')) active @endif"><a class="nav-item-hold" href="{{url($url.str_replace('/','','academy'))}}"><i class="nav-icon i-Tag"></i>Academy</a>-->
                    <!--</li>-->

                   <!--  <li class="nav-item @if(request()->is('cms*')) active @endif"><a class="nav-item-hold" href="{{url($url.'cms')}}"><i class="nav-icon i-Network"></i>CMS</a>
                    </li>

                    <li class="nav-item @if(request()->is('brands*')) active @endif"><a class="nav-item-hold" href="{{url($url.'brands')}}"><i class="nav-icon i-Internet"></i>Brands</a>
                    </li>

                    <li class="nav-item @if(request()->is('document_library*')) active @endif"><a class="nav-item-hold" href="{{url($url.'document_library')}}"><i class="nav-icon i-Folder-Video"></i>Library</a>
                    </li>

                    <li class="nav-item @if(request()->is('products*')) active @endif"><a class="nav-item-hold" href="{{url($url.'products')}}"><i class="nav-icon i-Gift-Box"></i>Products</a>
                    </li>

                    <li class="nav-item @if(request()->is('tag*')) active @endif"><a class="nav-item-hold" href="{{url($url.'tag')}}"><i class="nav-icon i-Tag"></i>Tag</a>
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



