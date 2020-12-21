<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 2:43 PM
 */
?>
@extends('layouts.app')
@section('content')
        <!--content -->
        <div class="content">
            <!--section -->
            <section id="sec1">
                <!-- container -->
                <div class="container">
                    <!-- profile-edit-wrap -->
                    <div class="profile-edit-wrap">
                        <div class="profile-edit-page-header">
                            <h2>Admin Panel</h2>
                            <div class="breadcrumbs"><a href="#">Home</a><span>Dasboard</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="fixed-bar fl-wrap">
                                    <div class="user-profile-menu-wrap fl-wrap">
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Main</h3>
                                            <ul>
                                                <li><a href="dashboard.html" class="user-profile-act"><i class="fa fa-gears"></i>Dashboard</a></li>
                                                <li><a href="dashboard-myprofile.html"><i class="fa fa-user-o"></i> Edit profile</a></li>
                                                <li><a href="dashboard-messages.html"><i class="fa fa-envelope-o"></i> Messages <span>3</span></a></li>
                                                <li><a href="dashboard-password.html"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Listings</h3>
                                            <ul>
                                                <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i> My listigs  </a></li>
                                                <li><a href="dashboard-bookings.html"> <i class="fa fa-calendar-check-o"></i> Bookings <span>2</span></a></li>
                                                <li><a href="dashboard-review.html"><i class="fa fa-comments-o"></i> Reviews </a></li>
                                                <li><a href="dashboard-add-listing.html"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <a href="#" class="log-out-btn">Log Out</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                        <h4>Helo , <span>Alisa</span></h4>
                                    </div>
                                    <div class="notification success fl-wrap">
                                        <p>Your listing <a href="#">Fitness Center Brooklyn</a> has been approved!</p>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                    <!-- statistic-container-->
                                    <div class="statistic-container fl-wrap">
                                        <!-- statistic-item-wrap-->
                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">
                                                <i class="fa fa-map-marker"></i>
                                                <div class="statistic-item-numder">21</div>
                                                <h5>Active Listings</h5>
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->
                                        <!-- statistic-item-wrap-->
                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">
                                                <i class="fa fa fa-eye"></i>
                                                <div class="statistic-item-numder">1054</div>
                                                <h5>Listing Views</h5>
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->
                                        <!-- statistic-item-wrap-->
                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">
                                                <i class="fa fa-comments-o"></i>
                                                <div class="statistic-item-numder">675</div>
                                                <h5>Total Reviews</h5>
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->
                                        <!-- statistic-item-wrap-->
                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">
                                                <i class="fa fa-heart-o"></i>
                                                <div class="statistic-item-numder">154</div>
                                                <h5>Times Bookmarked</h5>
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->
                                    </div>
                                    <!-- statistic-container end-->
                                </div>
                                <!-- profile-edit-container end-->

                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Recent Activities</h3>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">
                                                <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- dashboard-list end-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--profile-edit-wrap end -->
                </div>
                <!--container end -->
            </section>
            <!-- section end -->
            <div class="limit-box fl-wrap"></div>
            <!--section -->
            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Do You Have Questions ?</h3>
                                <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                            </div>
                            <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
        </div>
@endsection
