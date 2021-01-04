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
                        <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>Edit profile</span>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
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
                                                <li><a href="{{ route('profile') }}" class="user-profile-act"><i
                                                                class="fa fa-user-o"></i> Edit profile</a></li>
                                                <li><a href="#"><i class="fa fa-envelope-o"></i>
                                                        Messages <span>3</span></a></li>
                                                <li><a href="{{ route('password') }}"><i class="fa fa-unlock-alt"></i>Change
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
                            <div class="col-md-7">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap">
                                        <h4>My Account</h4>
                                    </div>
                                    <div class="custom-form pl-55">
                                        <label>Email Address<i class="fa fa-envelope-o"></i> </label>
                                        <input type="email" readonly value="{{ Auth::user()->email }}"/>

                                        <label> @if(Auth::user()->role == "Company") Company Name <i class="fa fa-home"></i> @else First Name <i class="fa fa-user-o"></i> @endif </label>
                                        @if(Auth::user()->role == "Company")
                                            <input type="text" name="first_name"
                                               placeholder="Balistreri"
                                               value="{{ old('first_name') ? old('first_name') :( $detail? $detail->company_name :'' )}}"/>
                                        @else
                                            <input type="text" name="first_name"
                                                   placeholder="Alisa"
                                                   value="{{ old('first_name') ? old('first_name') :( $detail? $detail->first_name :'' )}}"/>
                                        @endif

                                        <label> @if(Auth::user()->role == "Company") Manager Name @else Last Name @endif <i class="fa fa-user-o"></i></label>
                                        @if(Auth::user()->role == "Company")
                                            <input type="text" name="last_name"
                                               placeholder="AlisaNoory"
                                               value="{{ old('last_name') ? old('last_name') :( $detail? $detail->manager_name :'' )}}"/>
                                        @else
                                            <input type="text" name="last_name"
                                                   placeholder="Noory"
                                                   value="{{ old('last_name') ? old('last_name') :( $detail? $detail->last_name :'' )}}"/>
                                        @endif

                                        <label>Phone<i class="fa fa-phone"></i> </label>
                                        <input type="text" name="phone" placeholder="+7(123)987654" value="{{ old('phone') ? old('phone') :( $detail? $detail->phone :'' )}}"/>

                                        <label> Address <i class="fa fa-map-marker"></i> </label>
                                        <input type="text" name="address" placeholder="USA 27TH Brooklyn NY" value="{{ old('address') ? old('address') :( $detail? $detail->address :'' )}}"/>

                                        <label> Gender <i class="fa fa-female"></i> </label>
                                        <select name="gender">
                                            <option value="" disabled selected>- Select Gender -</option>
                                            <option value="male" {{ old('gender')? (Input::old('gender')== 'male'? 'selected':''): ($detail? ( $detail->gender == 'male'? 'selected':''): '') }} >Male
                                            </option>
                                            <option value="female"{{ old('gender')? (Input::old('gender')== 'female'? 'selected':''): ($detail? ( $detail->gender == 'female'? 'selected':''): '') }} >Female
                                            </option>
                                            <option value="others"{{ old('gender')? (Input::old('gender')== 'others'? 'selected':''): ($detail? ( $detail->gender == 'others'? 'selected':''): '') }} >Others
                                            </option>
                                        </select>

                                        @if(Auth::user()->role == "Company")
                                            <label> Fed ID <i class="fa fa-id-badge"></i> </label>
                                            <input type="text" name="fed_id" placeholder="346257245" value="{{ old('fed_id') ? old('fed_id') :( $detail? $detail->fed_id :'' )}}"/>

                                            <label> Category <i class="fa fa-tag"></i> </label>
                                            <select name="category_id">
                                                <option value="" disabled selected>- Select Category -</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id')? (Input::old('category_id')== $category->id? 'selected':''): ($detail? ( $detail->category_id == $category->id? 'selected':''): '') }} >{{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif

                                        @if(Auth::user()->role != "Admin")
                                            <label> @if(Auth::user()->role == "Company") Business License @else Driver
                                                License : {{ ( $detail? 'DONE' :'' ) }} @endif <i class="fa fa-file"></i> </label>
                                            <input type="file" name="license" placeholder="Upload license" value="{{ old('license') ? old('license') :( $detail? $detail->license :'' )}}"/>

                                            <label> Payment <i class="fa fa-paypal"></i> </label>
                                            <select name="payment_method">
                                                <option value="" disabled selected>- Select Payment -</option>
                                                @foreach(config('var.payment_method') as $item)
                                                    <option value="{{ $item }}" {{ old('payment_method')? (Input::old('payment_method')== $item? 'selected':''): ($detail? ( $detail->payment_method == $item? 'selected':''): '') }} >{{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <label> Notes</label>
                                            <textarea cols="40" rows="3" placeholder="About Me" name="about">{{ old('about') ? old('about') :( $detail? $detail->about :'' )}}</textarea>
                                        @endif
                                    </div>
                                </div>
                                <!-- profile-edit-container end-->
                                <!-- profile-edit-container-->
                                @if(Auth::user()->role == "Company")
                                    <div class="profile-edit-container add-list-container">
                                        <div class="profile-edit-header fl-wrap">
                                            <h4>Membership</h4>
                                        </div>
                                        <div class="custom-form">
                                            <div class="row">
                                                <!--col -->
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline">
                                                            <input type="radio" readonly value="basic" name="membership" {{ $detail? ($detail->membership=='basic'? 'selected': ''): '' }}>
                                                            <span>Basic 99$</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--col end-->
                                                <!--col -->
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline">
                                                            <input type="radio" readonly value='extended' name="membership" {{ $detail? ($detail->membership=='extended'? 'selected': ''): '' }}>
                                                            <span>Extended 99$</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--col end-->
                                                <!--col -->
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline">
                                                            <input type="radio" readonly value="premium" name="membership" {{ $detail? ($detail->membership=='premium'? 'selected': ''): '' }}>
                                                            <span>Professional 149$</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--col end-->
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- profile-edit-container end-->
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                        <h4>My Socials</h4>
                                    </div>
                                    <div class="custom-form  pl-55">
                                        <label>Facebook <i class="fa fa-facebook"></i></label>
                                        <input type="text" name="facebook_id" placeholder="https://www.facebook.com/"
                                               value="{{ old('facebook_id') ? old('facebook_id') :( $detail? $detail->facebook_id :'' )}}"/>
                                        <label>Twitter<i class="fa fa-twitter"></i> </label>
                                        <input type="text" name="twitter_id" placeholder="https://twitter.com/"
                                               value="{{ old('twitter_id') ? old('twitter_id') :( $detail? $detail->twitter_id :'' )}}"/>
                                        <label>LinkedIn<i class="fa fa-linkedin"></i> </label>
                                        <input type="text" name="linkedin_id" placeholder="https://www.linkedin.com"
                                               value="{{ old('linkedin_id') ? old('linkedin_id') :( $detail? $detail->linkedin_id :'' )}}"/>
                                        <label> Instagram <i class="fa fa-instagram"></i> </label>
                                        <input type="text" name="instagram_id" placeholder="https://www.instagram.com"
                                               value="{{ old('instagram_id') ? old('instagram_id') :( $detail? $detail->instagram_id :'' )}}"/>

                                        <button class="btn  big-btn  color-bg flat-btn">Save Changes<i
                                                    class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                <!-- profile-edit-container end-->
                            </div>
                            <div class="col-md-2">
                                <div class="edit-profile-photo fl-wrap">
                                    <img id="blah" src="{{'/storage/avatars/'. ($detail? $detail->avatar: 'boy.png')}}" alt="your image" class="respimg">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" onchange="readURL(this);" name="avatar" class="upload" value="{{ old('avatar') ? old('avatar') :( $detail? $detail->avatar :'' )}}">
                                        </div>
                                    </div>
                                </div>
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