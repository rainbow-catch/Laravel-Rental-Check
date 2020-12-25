<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!--=============== basic  ===============-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
    {{--<link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
</head>

<body>
<!--loader-->
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<!--loader end-->
<!-- Main  -->
<div id="main">
    @include('layouts.header')
    <div id="wrapper">
        <!-- Content-->
    @yield('content')
    <!-- Content end -->
    @include('layouts.footer')
    </div>

    @guest()
        <!--register form -->
            <div class="main-register-wrap modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="container main-register fl-wrap" style="max-width: 500px">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <h3>Sign In <span>iCheck<strong>Rental</strong></span></h3>
                        <div class="soc-log fl-wrap">
                            <p>For faster login or register use your social account.</p>
                            <a href="{{ url('/social/auth/redirect', ['facebook']) }}" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                            <a href="{{ url('/social/auth/redirect', ['twitter']) }}" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                        </div>
                        <div class="log-separator fl-wrap"><span>or</span></div>
                        <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1">Login</a></li>
                                <li><a href="#tab-2">Register</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1" class="tab-content">
                                    <div class="custom-form">
                                        <form action="{{ route('login') }}" method="post" name="registerform">
                                            @csrf
                                            <label>Email Address * </label>
                                            <input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                   value="{{ old('email') }}" required type="email" onClick="this.select()">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <label>Password * </label>
                                            <input name="password" type="password"
                                                   class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   onClick="this.select()" value="">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="remember">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="{{ route('password.request') }}">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <div class="custom-form">
                                            <form action="{{ route('register') }}" method="post" name="registerform"
                                                  class="main-register-form" id="main-register-form2">
                                                @csrf

                                                <label>Email Address *</label>
                                                <input name="email" type="email" onClick="this.select()"
                                                       class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif

                                                <label>Password *</label>
                                                <input name="password" type="password" onClick="this.select()"
                                                       class="{{ $errors->has('Password') ? ' is-invalid' : '' }}"
                                                       value="{{ old('Password') }}" required>
                                                @if ($errors->has('Password'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Password') }}</strong>
                                                </span>
                                                @endif
                                                <label>Password Confirmation*</label>
                                                <input name="password_confirmation" type="password" onClick="this.select()"
                                                       required>

                                                <label>Select Role *</label>
                                                <select name="role">
                                                    <option value="" disabled selected>- Select Role -</option>
                                                    <option value="Admin" @if(old('role')=="Admin" ) selected="selected"
                                                            @endif>Admin
                                                    </option>
                                                    <option value="Company" @if(old('role')=="company" ) selected="selected"
                                                            @endif>Company
                                                    </option>
                                                    <option value="Customer" @if(old('role')=="customer" ) selected="selected"
                                                            @endif>Customer
                                                    </option>
                                                </select>
                                                @if ($errors->has('role'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                                @endif

                                                <label>Security Question</label>
                                                <select name="security_question_id">
                                                    <option value="" disabled selected>- Select Question -</option>
                                                    @foreach($questions as $question)
                                                        <option value="{{ $question->id }}" {{ old('security_question_id')==$question->id? 'selected': ''  }} >
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
                                                       value="{{ old('security_answer') }}">
                                                @if ($errors->has('security_answer'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('security_answer') }}</strong>
                                                </span>
                                                @endif

                                                <!--Repeat Password-->
                                                <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @else
        <!--register form end -->
    @endguest
<a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@yield('scripts')
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqifuyms9Dcg68sKoOokZQZkl9l3IZUKY&libraries=places&callback=initAutocomplete"></script>--}}
<script>
    $(document).ready(function() {
        @if($errors -> all())
        @foreach($errors -> all() as $error)
        toastr.warning("{{ $error }}")
        @endforeach
        @endif
    })
</script>
</body>

</html>