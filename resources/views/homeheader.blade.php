<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RegalDollars.com - Title goes here</title>
    <!-- CUSTOM STYLE -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- THEME TYPO -->
    <link href="{{ URL::asset('public/assets/css/themetypo.css') }}" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link href="{{ URL::asset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- COLOR FILE -->
    <link href="{{ URL::asset('public/assets/css/color.css') }}" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- BX SLIDER -->
    <link href="{{ URL::asset('public/assets/css/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/css/bootstrap-slider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/css/widget.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/css/shortcode.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- <link href="{{ URL::asset('public/assets/css/js/dl-menu/component.css') }}" rel="stylesheet"> -->
    <link href="{{ URL::asset('public/assets/css/publicstyle.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/css/responsive.css') }}" rel="stylesheet">   
</head>
<body class="<?php if (isset($pageclass) && !empty($pageclass)) {echo $pageclass;}?>">
<!--WRAPPER START-->

<div class="wrapper">
    <!--HEADER START-->
    <header>
        <!--NAV CONTAINER START-->
        <div class="nav-container">
            <div class="container">
                <!--LOGO START-->
                <div class="logo">
                    <img src="{{ URL::asset('public/assets/images/peacock.png') }}" style="height:40px;"><img src="{{ URL::asset('public/assets/images/logo.png') }}" alt="">
               </div>
                <div class="nav-content">
                    <div id="kode-responsive-navigation" class="dl-menuwrapper">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li class="menu-item kode-parent-menu">
                                <a href="{{ url('/') }}">Home</a>
                           </li>
                           <li>
                              <a class="show_drop_down" href="#investment">Investment Plans</a>
                              <ul class="children">
                                 <li><a href="#suppplemented">Supplemented Income Plan</a></li>
                                 <li><a href="#24mo">24 Month Growth Plan</a></li>
                                 <li><a href="#36mo">36 Month Wealth Plan</a></li>
                                 <li><a href="#60mo">60 Month Millionaire&trade; Plan</a></li>
                              </ul>
                           </li>
                           <li><a href="#investment">Investment Plans</a></li>
                        </ul>
                        </li>
                        <li class="menu-item kode-parent-menu">
                           <a href="/faq">FAQ</a>
                        </li>
                        <li class="menu-item kode-parent-menu">
                           <a href="#about">About Us</a>
                        </li>
                        <li>
                           <a href="#contact">Contact Us</a>
                        </li>
                     </ul>
                  </div>
                  <div class="navigation">
                     <ul class="site_nav_main">
                        <li class="menu-item kode-parent-menu">
                           <a href="{{ url('/') }}">Home</a>
                           <span class="nav-separator"></span>
                        </li>
                        <li>
                           <a class="show_drop_down" href="{{ url('/') }}">Investment Plans</a>
                            <span class="nav-separator"></span>
                           <!--
                        <ul class="children">
                           <li>
                              <a href="#suppplemented">Supplemented Income Plan</a>
                           </li>
                           <li>
                              <a href="#24mo">24 Month Growth Plan</a>
                           </li>
                           <li>
                              <a href="#36mo">36 Month Wealth Plan</a>
                           </li>
                           <li>
                              <a href="#60mo">60 Month Millionaire&trade; Plan</a>
                           </li>
                       </ul> 
                       -->
                       </li>
                        <li class="menu-item kode-parent-menu">
                           <a href="{{ url('/faq') }}">FAQ</a>
                           <span class="nav-separator"></span>
                        </li>
                        <li class="menu-item kode-parent-menu">
                           <a href="{{ url('/about_us') }}">About Us</a>
                           <span class="nav-separator"></span>
                        </li>
                        <li>
                           <a href="{{ url('/contact_us') }}">Contact Us</a>
                        </li>
                     </ul>

                     <div class="show_login_signup dropdown admin-list">
                     @if (Auth::check())
                           @php 
                           $Role = Auth::user()->roles->first();
                           $roleName = '/'.$Role->name;
                           @endphp
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                              <ul class="dropdown-menu">
                                 @if (is_null(Auth::user()->email_verified_at))
                                 <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @else
                                 <li><a href="{{ url($roleName) }}">Dashboard</a></li>
                                 <li><a href="{{ url($roleName)}}/account">Profile</a></li>
                                
                                 <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @endif
                        @csrf
                        </form>
                        </li>
                              </ul>

                        @else
                           <!-- <a class="sign_up_btn" href="{{ route('register') }}">Sign UP</a> -->
                           <a class="log_in_btn" href="{{ url('/login') }}">Log In</a>
                        @endif

                     </div> 
                     
                </div>

               <!--mobile responsive menu--> 
               <div class="dropdown responsive_mobile_nav">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i> Menu
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                     <li>
                        <a tabindex="-1" href="{{ url('/') }}">Home</a>
                     </li>
                     <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="{{ url('/') }}">Investment Plans<span class="caret"></span></a>
                        <!--ul class="dropdown-menu">
                           <li>
                              <a tabindex="-1" href="#">24 Month Growth Plan</a>
                           </li>
                           <li>
                              <a tabindex="-1" href="#">36 Month Wealth Plan</a>
                           </li>                      
                           <li>
                              <a tabindex="-1" href="#">60 Month Millionaire&trade; Plan</a>
                           </li>                      
                        </ul-->
                     </li>
                     <li>
                        <a href="{{ url('/faq') }}">FAQ</a>
                     </li>

                     <li>
                        <a href="{{ url('/about_us') }}">About Us</a>
                     </li>

                     <li>
                        <a href="{{ url('/contact_us') }}">Contact Us</a>
                     </li>

                     <div class="show_login_signup dropdown admin-list">
                     @if (Auth::check())
                           @php 
                           $Role = Auth::user()->roles->first();
                           $roleName = '/'.$Role->name;
                           @endphp
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                              <ul class="dropdown-menu">
                                 @if (is_null(Auth::user()->email_verified_at))
                                 <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @else
                                 <li><a href="{{ url($roleName) }}">Dashboard</a></li>
                                 <li><a href="{{ url($roleName)}}/account">Profile</a></li>
                                
                                 <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @endif
                        @csrf
                        </form>
                        </li>
                              </ul>

                        @else
                           <!-- <a class="sign_up_btn" href="{{ route('register') }}">Sign UP</a> -->
                           <a class="log_in_btn" href="{{ url('/login') }}">Log In</a>
                        @endif

                     </div>
                     
                  </ul>
               </div>
			   
   
               <!--mobile responsive menu-->

            </div>
        </div>
    </header>

  
    <!-- <div class="inner-banner kode-team-section overlay movingbg normaltopmargin normalbottommargin light movingbg" data-id="customizer" data-title="Theme Customizer" data-direction='horizontal'>
      <div class="container">
         <p>
            <img src="{{ URL::asset('public/assets/images/peacock.png') }}" style="height:100px;">
         </p>
         <h2>Flexible Investments. Guaranteed Returns.<br />Freedom to cancel at any time.</h2>
         <ol class="breadcrumb">
            <li style="color:#EFEFEF;">
               RegalDollars is a money investment company with
               <span style="text-decoration:underline;">guaranteed</span> returns.<br />
               <span style="font-size:.75em;">(some restrictions apply)</span>
            </li>
         </ol>
        </div>
    </div> -->

    
