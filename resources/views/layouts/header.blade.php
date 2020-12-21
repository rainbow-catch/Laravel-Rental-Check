<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 9:10 AM
 */?>
@section('header')
<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>
        <div class="header-search vis-header-search">
            <div class="header-search-input-item">
                <input type="text" placeholder="Keywords" value=""/>
            </div>
            <div class="header-search-select-item">
                <select data-placeholder="All Categories" class="chosen-select" >
                    <option>Categories</option>
                    <option>Auto Rental</option>
                    <option>Apartments Rental</option>
                    <option>Equipments Rental</option>
                    <option>Furniture Rental</option>
                    <option>Events Rental</option>
                </select>
            </div>
            <button class="header-search-button" onclick="window.location.href='listing.html'">Search</button>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        <a href="dashboard-add-listing.html" class="add-list">Make A Complaint<span><i class="fa fa-plus"></i></span></a>
        @guest()
            @if(!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] !== '/login')<div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>@endif
        @else
            <div class="header-user-menu">
                <div class="header-user-name">
                    <span><img src="{{ asset('storage/avatars/'.Auth::user()->avatar) }}" alt=""></span>
                    Hello , {{ Auth::user()->first_name." ".Auth::user()->last_name }}
                </div>
                <ul>
                    <li><a href="dashboard-myprofile.html"> Edit profile</a></li>
                    <li><a href="dashboard-add-listing.html"> Add Listing</a></li>
                    <li><a href="dashboard-bookings.html">  Bookings  </a></li>
                    <li><a href="dashboard-review.html"> Reviews </a></li>
                    <li><a href="{{ route('logout') }}">Log Out</a></li>
                </ul>
            </div>
        @endguest
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li>
                        <a href="#" class="act-link">Home <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="index.html">Parallax Image</a></li>
                            <li><a href="index2.html">Video</a></li>
                            <li><a href="index3.html">Map</a></li>
                            <li><a href="index4.html">Slideshow</a></li>
                            <li><a href="index5.html">Slider</a></li>
                            <li><a href="index6.html">Fullscreen Slider</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                    <!--<li>
                        <a href="#">Listings<i class="fa fa-caret-down"></i></a>-->
                    <!--second level -->
                    <!--   <ul>
                           <li><a href="listing.html">Column map</a></li>
                           <li><a href="listing2.html">Column map 2</a></li>
                           <li><a href="listing3.html">Fullwidth Map</a></li>
                           <li><a href="listing4.html">Fullwidth Map 2</a></li>
                           <li><a href="listing5.html">Without Map</a></li>
                           <li><a href="listing6.html">Without Map 2</a></li>
                           <li>
                               <a href="#">Single <i class="fa fa-caret-down"></i></a>-->
                    <!--third  level  -->
                    <!-- <ul>
                         <li><a href="listing-single.html">Style 1</a></li>
                         <li><a href="listing-single2.html">Style 2</a></li>
                         <li><a href="listing-single3.html">Style 3</a></li>
                         <li><a href="listing-single4.html">Style 4</a></li>
                     </ul>-->
                    <!--third  level end-->
                    <!-- </li> -->
                    <!-- </ul> -->
                    <!--second level end-->
                    <!-- </li> -->
                    <li>
                        <!--<a href="blog.html">News</a>-->
                    </li>
                    <li>
                        <a href="#">Pages <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contacts.html">Contact Us</a></li>
                            <!--<li><a href="author-single.html">User single</a></li>-->
                            <li><a href="how-itworks.html">How It Works</a></li>
                            <li><a href="pricing-tables.html">Pricing</a></li>
                            <li><a href="dashboard-myprofile.html">User Dashboard</a></li>
                            <li><a href="blog-single.html">Blog </a></li>
                            <li><a href="dashboard-add-listing.html">Make A Complaint</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="header2.html">Header 2</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
@show
