<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html"; charset="UTF-8"; />
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <title>Newspaper - @yield('title')</title>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="{{asset('admin/css')}}/style.css" rel="stylesheet">
   
    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">

    @yield('style')
</head>

<body class="app">
<div id="loader">
<div class="spinner"></div>
</div>
<script type="text/javascript">
window.addEventListener('load', () => {
const loader = document.getElementById('loader');
setTimeout(() => {
loader.classList.add('fadeOut');
}, 300);
});
</script>
<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="index.html" class="td-n">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="{{ asset('admin/assets/static/images/logo.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="#" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 active">
                    <a class="sidebar-link" href="{{url('/admin/dashboard')}}" default>
                            <span class="icon-holder">
                                <i class="c-blue-500 ti-home"></i>
                            </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="c-orange-500 ti-layout-list-thumb"></i>
                            </span>
                        <span class="title">News</span>
                        <span class="arrow">
                                <i class="ti-angle-right"></i>
                            </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/news/list')}}">News List</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/news/pulling/list')}}">Pulling</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{route('rssList')}}">Rss Sources</a>
                        </li>
                    </ul>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="{{route('rssList')}}">--}}
                            {{--<span class="icon-holder">--}}
                                {{--<i class="c-deep-orange-500 ti-calendar"></i>--}}
                            {{--</span>--}}
                        {{--<span class="title">Rss</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/category/list')}}">
                            <span class="icon-holder">
                                <i class="c-brown-500 ti-email"></i>
                            </span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/tag/list')}}">
                            <span class="icon-holder">
                                <i class="c-blue-500 ti-share"></i>
                            </span>
                        <span class="title">Tags</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/media/list')}}">
                            <span class="icon-holder">
                                <i class="c-deep-orange-500 ti-calendar"></i>
                            </span>
                        <span class="title">Media</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/theme/list')}}">
                            <span class="icon-holder">
                                <i class="c-deep-purple-500 ti-comment-alt"></i>
                            </span>
                        <span class="title">Theme</span>
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="c-orange-500 ti-layout-list-thumb"></i>
                            </span>
                        <span class="title">Pages & Menu</span>
                        <span class="arrow">
                                <i class="ti-angle-right"></i>
                            </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/page/list')}}">Pages</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/menu')}}">Menu</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/advertisement/list')}}">
                            <span class="icon-holder">
                                <i class="c-indigo-500 ti-bar-chart"></i>
                            </span>
                        <span class="title">Advertisments</span>
                    </a>


                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="c-orange-500 ti-layout-list-thumb"></i>
                                </span>
                        <span class="title">Users</span>
                        <span class="arrow">
                                    <i class="ti-angle-right"></i>
                                </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/users/subscriber/list')}}">Subscriber</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{url('/admin/users/admin-user/list')}}">Admin User</a>
                        </li>
                    </ul>
                </li>


                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/settings')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 ti-pencil"></i>
                            </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('/admin/faq')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 ti-book"></i>
                            </span>
                        <span class="title">FAQ</span>
                    </a>
                </li>


                {{--
                <li class="nav-item dropdown">
                    <a class="sidebar-link" href="ui.html">
                        <span class="icon-holder">
                            <i class="c-pink-500 ti-palette"></i>
                        </span>
                        <span class="title">UI Elements</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-orange-500 ti-layout-list-thumb"></i>
                        </span>
                        <span class="title">Tables</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="basic-table.html">Basic Table</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="datatable.html">Data Table</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-purple-500 ti-map"></i>
                        </span>
                        <span class="title">Maps</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="google-maps.html">Google Map</a>
                        </li>
                        <li>
                            <a href="vector-maps.html">Vector Map</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-red-500 ti-files"></i>
                        </span>
                        <span class="title">Pages</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="404.html">404</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="500.html">500</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="signin.html">Sign In</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="signup.html">Sign Up</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-teal-500 ti-view-list-alt"></i>
                        </span>
                        <span class="title">Multiple Levels</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0);">
                                <span>Menu Item</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0);">
                                <span>Menu Item</span>
                                <span class="arrow">
                                    <i class="ti-angle-right"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:void(0);">Menu Item</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Menu Item</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li>
                        <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="search-box">
                        <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                            <i class="search-icon ti-search pdd-right-10"></i>
                            <i class="search-icon-close ti-close pdd-right-10"></i>
                        </a>
                    </li>
                    <li class="search-input">
                        <input class="form-control" type="text" placeholder="Search...">
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="notifications dropdown">
                        <span class="counter bgc-red">3</span>
                        <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="pX-20 pY-15 bdB">
                                <i class="ti-bell pR-10"></i>
                                <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                            </li>
                            <li>
                                <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                    <span>
                                                        <span class="fw-500">John Doe</span>
                                                        <span class="c-grey-600">liked your
                                                            <span class="text-dark">post</span>
                                                        </span>
                                                    </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">5 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/2.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                    <span>
                                                        <span class="fw-500">Moo Doe</span>
                                                        <span class="c-grey-600">liked your
                                                            <span class="text-dark">cover image</span>
                                                        </span>
                                                    </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">7 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                    <span>
                                                        <span class="fw-500">Lee Doe</span>
                                                        <span class="c-grey-600">commented on your
                                                            <span class="text-dark">video</span>
                                                        </span>
                                                    </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">10 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pX-20 pY-15 ta-c bdT">
                                    <span>
                                        <a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications
                                            <i class="ti-angle-right fsz-xs mL-10"></i>
                                        </a>
                                    </span>
                            </li>
                        </ul>
                    </li>
                    <li class="notifications dropdown">
                        <span class="counter bgc-blue">3</span>
                        <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                            <i class="ti-email"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="pX-20 pY-15 bdB">
                                <i class="ti-email pR-10"></i>
                                <span class="fsz-sm fw-600 c-grey-900">Emails</span>
                            </li>
                            <li>
                                <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer">
                                                            <p class="fw-500 mB-0">John Doe</p>
                                                        </div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">5 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/2.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer">
                                                            <p class="fw-500 mB-0">Moo Doe</p>
                                                        </div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">15 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p"
                                                     src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer">
                                                            <p class="fw-500 mB-0">Lee Doe</p>
                                                        </div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">25 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pX-20 pY-15 ta-c bdT">
                                    <span>
                                        <a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Email
                                            <i class="fs-xs ti-angle-right mL-10"></i>
                                        </a>
                                    </span>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                            <div class="peer mR-10">
                                <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
                            </div>
                            <div class="peer">
                                <span class="fsz-sm c-grey-900">John Doe</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">
                            <li>
                                <a href="{{url('/admin/settings')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-settings mR-10"></i>
                                    <span>Setting</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-user mR-10"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-email mR-10"></i>
                                    <span>Messages</span>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{url('/logout')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-power-off mR-10"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        @yield('content')

        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2017 Designed by
                    <a href="https://colorlib.com/" target="_blank" title="Colorlib">Colorlib</a>. All rights reserved.</span>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>--}}
            {{--<script>--}}
            {{--window.dataLayer = window.dataLayer || [];--}}
            {{--function gtag() { dataLayer.push(arguments); }--}}
            {{--gtag('js', new Date());--}}
            {{--gtag('config', 'UA-23581568-13');--}}
            {{--</script>--}}
        </footer>
    </div>
</div>

<script type="text/javascript" src="{{asset('admin/js')}}/vendor.js"></script>
<script type="text/javascript" src="{{asset('admin/js')}}/bundle.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- toastr notifications -->
{{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script>
    setTimeout(function(){
        $('img').css('display',"block");
    },1000);
</script>

@yield('script')

</body>
<!-- Mirrored from colorlib.com/polygon/adminator/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jan 2018 17:21:45 GMT -->

</html>