@php
    $setting = setting();
@endphp
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>@yield("title") | .:{{ config('app.name', 'EZ Fuel') }}:.</title>
   <meta name="description" >
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset($setting->icon ?? "frontend/img/favicon.png") }}">

   <link rel="stylesheet" href="{{ asset("frontend/css/bootstrap.min.css") }}">
   <link rel="stylesheet" href="{{ asset("frontend/css/style.css") }}">
   <link rel="stylesheet" href="{{ asset("frontend/css/responsive.css") }}">

   <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
   {{-- vite(['resources/css/app.css', 'resources/js/app.js']) --}}
   @yield('css')
</head>
<body id="app" >
    
@if($errors->any())
    @foreach ($errors->all() as $error)

    @php
        \Brian2694\Toastr\Facades\Toastr::error($error,'Title', ["positionClass" => "toast-top-center"]);
    @endphp

    @endforeach
@endif

@if(session('status'))
    @php
        \Brian2694\Toastr\Facades\Toastr::success(session('status'),'Title', ["positionClass" => "toast-top-center"]);
    @endphp
@endif

<div class="page-loader">
   <span class="loader-3"></span>
</div>

<!-- header -->
<header class="header-area">
   <!--<div class="call-box d-flex align-items-center justify-content-center">-->
   <!--   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">-->
   <!--      <path fill="18232b" d="M18.93 20q-2.528 0-5.184-1.266q-2.656-1.267-4.934-3.555q-2.28-2.289-3.546-4.935Q4 7.598 4 5.07q0-.458.3-.763Q4.6 4 5.05 4h2.473q.408 0 .712.257t.411.658L9.142 7.3q.07.42-.025.733q-.094.313-.332.513L6.59 10.592q.616 1.118 1.361 2.076q.745.959 1.59 1.817q.87.87 1.874 1.62q1.004.749 2.204 1.414l2.139-2.177q.244-.263.549-.347q.305-.083.674-.033l2.104.43q.407.1.661.41q.254.311.254.713v2.435q0 .45-.306.75q-.305.3-.763.3M6.12 9.654l1.92-1.766q.096-.076.124-.211q.03-.135-.01-.25l-.443-2.12q-.039-.153-.135-.23T7.327 5H5.275q-.115 0-.192.077t-.077.192q.029 1.025.32 2.14q.293 1.116.795 2.245m8.45 8.334q1.014.502 2.16.743q1.148.24 2 .257q.115 0 .192-.076q.077-.077.077-.193v-2.007q0-.154-.077-.25q-.077-.097-.23-.135l-1.85-.379q-.116-.038-.203-.01q-.086.03-.182.125zm0 0"/>-->
   <!--   </svg>-->
   <!--   <a href="tel:+91 854 789-8746">Emergency Call: {{ $setting->phone }}</a>-->
   <!--</div>-->
   <div id="header-sticky" class="menu-area">
      <nav class="navbar navbar-expand-lg">
         <div class="container">
            <a class="navbar-brand" href="{{ route("index") }}"><img src="{{ asset($setting->logo ?? "frontend/img/logo.png") }}" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false">
               <span></span>
               <span></span>
               <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                    <li class="nav-item">
                       <a class="nav-link {{ Request::route()->named('index') ? 'active' : '' }}" href="{{ route("index") }}">Home</a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link {{ Request::route()->named('about') ? 'active' : '' }}" href="{{ route("about") }}">About Us</a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link {{ Request::route()->named('service') ? 'active' : '' }}" href="{{ route("service") }}">Service</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('plans') ? 'active' : '' }}" href="{{ route("plans") }}">Membership Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('contact') ? 'active' : '' }}" href="{{ route("contact") }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link reqfuel" href="{{ route("register") }}">Request Fuel</a>
                    </li>
               </ul>
               <ul class="sign-btn">
                @auth()

                <ul class="sign-btn">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                            <img class="me-1" src="{{ asset(auth()->user()->image ?? "avater.webp") }}" width="20" height="20" alt="img" style="border-radius:30px; border:1px solid #fff">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end " data-bs-popper="static">
                            <li><a href="{{ route("dashboard") }}">My Profile</a></li>
                            <li><a href="{{ route("logout") }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="border-bottom:0">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </ul>
                    </div>
                </ul>

                @else
                <a href="{{ route("register") }}" class="signup">Sign Up</a>
               <a href="{{ route("login") }}" class="signin">Sign In</a>
                @endauth

            </ul>
            </div>
         </div>
      </nav>
   </div>
</header>
<!-- header-end -->


@yield('main')


<!-- footer -->
<footer class="footer-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
            <div class="footer-info">
               <a href="{{ route("index") }}"><img src="{{ asset($setting->logo ?? "frontend/img/logo.png") }}" alt="img"></a>
               <p>
                  {!! $setting->short_description !!}
               </p>
            </div>
         </div>
         <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="footer-info mbf">
               <h2>Our Links</h2>
               <ul>
                  <li><a href="{{ route("about") }}">About Us</a></li>
                  <li><a href="{{ route("service") }}">Service</a></li>
                  <li><a href="{{ route("plans") }}">Membership Plans</a></li>
                  <li><a href="{{ route("contact") }}"> Contact Us</a></li>
               </ul>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="footer-info mbf">
               <h2>Contact With</h2>
               <!--<div class="d-flex align-items-center mb-3">-->
               <!--   <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48"><path fill="#d9d9d9" fill-rule="evenodd" d="M8.889 8A.894.894 0 0 0 8 8.889C8 26.073 21.927 40 39.111 40a.894.894 0 0 0 .889-.889V32.52a.894.894 0 0 0-.889-.889c-2.449 0-4.84-.395-7.057-1.127l-.01-.004a.878.878 0 0 0-.896.215l-4.67 4.67l-.648-.332c-5.531-2.834-10.067-7.348-12.883-12.884l-.33-.647l4.67-4.67a.896.896 0 0 0 .226-.913a22.458 22.458 0 0 1-1.124-7.05A.894.894 0 0 0 15.5 8zM6 8.889A2.894 2.894 0 0 1 8.889 6H15.5a2.894 2.894 0 0 1 2.889 2.889c0 2.254.36 4.415 1.026 6.43l.002.006l.002.007a2.895 2.895 0 0 1-.719 2.934l-3.634 3.635A27.624 27.624 0 0 0 26.1 32.933l3.633-3.633a2.878 2.878 0 0 1 2.953-.694a20.546 20.546 0 0 0 6.424 1.024A2.894 2.894 0 0 1 42 32.519v6.592A2.894 2.894 0 0 1 39.111 42C20.822 42 6 27.178 6 8.889" clip-rule="evenodd"/></svg>-->
               <!--   <a class="clink" href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>-->
               <!--</div>-->
               <div class="d-flex align-items-center mb-3">
                  <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 20 20"><path fill="#d9d9d9" d="M15.5 4A2.5 2.5 0 0 1 18 6.5v8a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 2 14.5v-8A2.5 2.5 0 0 1 4.5 4zM17 7.961l-6.746 3.97a.5.5 0 0 1-.426.038l-.082-.038L3 7.963V14.5A1.5 1.5 0 0 0 4.5 16h11a1.5 1.5 0 0 0 1.5-1.5zM15.5 5h-11A1.5 1.5 0 0 0 3 6.5v.302l7 4.118l7-4.12v-.3A1.5 1.5 0 0 0 15.5 5"/></svg>
                  <a class="clink" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
               </div>
               <!--<div class="d-flex align-items-center">-->
               <!--   <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 256 256"><path fill="#d9d9d9" d="M128 66a38 38 0 1 0 38 38a38 38 0 0 0-38-38m0 64a26 26 0 1 1 26-26a26 26 0 0 1-26 26m0-112a86.1 86.1 0 0 0-86 86c0 30.91 14.34 63.74 41.47 94.94a252.32 252.32 0 0 0 41.09 38a6 6 0 0 0 6.88 0a252.32 252.32 0 0 0 41.09-38c27.13-31.2 41.47-64 41.47-94.94a86.1 86.1 0 0 0-86-86m0 206.51C113 212.93 54 163.62 54 104a74 74 0 0 1 148 0c0 59.62-59 108.93-74 120.51"/></svg>-->
               <!--   <span>{{ $setting->address }}</span>-->
               <!--</div>-->
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="copy-text text-center">
               Copyright &copy; {{ config('app.name', 'EZ Fuel') }} 2024-2028. All rights reserved.
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer-end -->

<a class="smoth-scroll" href="#top">
   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" >
      <path fill="#18232b" d="m12 4l-.354-.354l.354-.353l.354.353zm.5 15a.5.5 0 0 1-1 0zM5.646 9.646l6-6l.708.708l-6 6zm6.708-6l6 6l-.708.708l-6-6zM12.5 4v15h-1V4z" />
   </svg>
</a>


<!-- JS here -->
<script src="{{ asset("frontend/js/jquery.min.js") }}"></script>
<script src="{{ asset("frontend/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("frontend/js/main.js") }}"></script>

<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@yield('js')



</body>
</html>
