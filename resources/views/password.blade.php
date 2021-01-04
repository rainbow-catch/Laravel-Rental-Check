<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/24/2020
 * Time: 12:56 PM
 */
?>

@extends('layouts.app')

@section('content')
    <div class="content">
        <!--section -->
        <section>
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Edit profile</h2>
                        <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>Change Password</span>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-3">
                                <div class="fixed-bar fl-wrap">
                                    <div class="user-profile-menu-wrap fl-wrap">
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Main</h3>
                                            <ul>
                                                <li><a href="{{ route('dashboard') }}"><i class="fa fa-gears"></i>Dashboard</a>
                                                </li>
                                                <li><a href="{{ route('profile') }}"><i
                                                                class="fa fa-user-o"></i> Edit profile</a></li>
                                                <li><a href="#"><i class="fa fa-envelope-o"></i>
                                                        Messages <span>3</span></a></li>
                                                <li><a href="{{ route('password') }}" class="user-profile-act"><i class="fa fa-unlock-alt"></i>Change
                                                        Password</a></li>
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Listings</h3>
                                            <ul>
                                                <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i>
                                                        My listigs </a></li>
                                                <li><a href="dashboard-bookings.html"> <i
                                                                class="fa fa-calendar-check-o"></i> Bookings
                                                        <span>2</span></a></li>
                                                <li><a href="dashboard-review.html"><i class="fa fa-comments-o"></i>
                                                        Reviews </a></li>
                                                <li><a href="dashboard-add-listing.html"><i
                                                                class="fa fa-plus-square-o"></i> Add New</a></li>
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
                                        <h4>Change Password</h4>
                                    </div>
                                    <div class="custom-form no-icons">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>New Password</label>
                                            <input type="password" name='password' class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Confirm New Password</label>
                                            <input type="password" name='password_confirmation' class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                    </div>

                                    {{--Security Question--}}
                                    <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                        <h4>Security Question</h4>
                                    </div>
                                    <div class="custom-form no-icons">
                                        <label>Security Question</label>
                                        <select name="security_question_id">
                                            <option value="" disabled selected>- Select Question -</option>
                                            <option value="" {{ Auth::user()->security_question_id==null? 'selected': ''  }}>None</option>
                                            @foreach($questions as $question)
                                                <option value="{{ $question->id }}" {{ Auth::user()->security_question_id==$question->id? 'selected': ''  }} >
                                                    {{ $question->question }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('security_question_id'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('security_question_id') }}</strong>
                                                </span>
                                        @endif

                                        <label>Answer</label>
                                        <input name="security_answer" type="text" onClick="this.select()"
                                               class="{{ $errors->has('security_answer') ? ' is-invalid' : '' }}"
                                               value="{{ Auth::user()->security_answer }}">
                                        @if ($errors->has('security_answer'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('security_answer') }}</strong>
                                                </span>
                                        @endif
                                        <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                <!-- profile-edit-container end-->
                            </div>
                        </form>
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
                        <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i
                                        class="fa fa-envelope-o"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
    </div>
@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(120);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection