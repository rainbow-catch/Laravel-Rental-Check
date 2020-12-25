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
                        <h2>Confirm Password</h2>
                        <div class="breadcrumbs"><a href="#">Home</a><a href="#">{{ ($securityQuestion) ? __('Security Question') : __('Confirm Password') }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="custom-form">
                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf
                                    @if ($securityQuestion)
                                        <b>{{ $securityQuestion->question }}</b>
                                        <br />
                                        <label>Answer *</label>
                                        <input name="security_answer" type="text" onClick="this.select()"
                                               class="{{ $errors->has('security_answer') ? ' is-invalid' : '' }}"
                                               value="{{ old('security_answer') }}" required>
                                        @if ($errors->has('security_answer'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('security_answer')  }}</strong>
                                                </span>
                                        <br />
                                        @endif
                                        <button type="submit" class="log-submit-btn">
                                            <span>{{ __('Confirm Answer') }}</span>
                                        </button>
                                    @else
                                        <b>Please confirm your password before continuing.</b>
                                        <br/>
                                        <label>Password *</label>
                                        <input name="password" type="password" onClick="this.select()"
                                               class="{{ $errors->has('Password') ? ' is-invalid' : '' }}"
                                               value="{{ old('Password') }}" required>
                                        @if ($errors->has('Password'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Password') }}</strong>
                                                </span>
                                        @endif

                                        <button type="submit" class="log-submit-btn"><span>Confirm Password</span></button>

                                        {{--@if (Route::has('password.request'))--}}
                                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                {{--{{ __('Forgot Your Password?') }}--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
