@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Update User</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/user/customer/'.$user->id, 'files' => true)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control border-input"
                                               placeholder="ex: Leonardo" value="{{$user->detail->first_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control border-input"
                                               placeholder="ex: Vinci" value="{{$user->detail->last_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option selected="" disabled="">- Select Gender -</option>
                                            <option value="male"
                                                    @if($user->detail->gender == "male")
                                                    selected="selected"
                                                    @endif
                                            >Male
                                            </option>
                                            <option value="female"
                                                    @if($user->detail->gender == "female")
                                                    selected="selected"
                                                    @endif
                                            >Female
                                            </option>
                                            <option value="others"
                                                    @if($user->detail->gender == "others")
                                                    selected="selected"
                                                    @endif
                                            >Others
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control border-input"
                                               placeholder="Phone Number" value="{{$user->detail->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control border-input"
                                               placeholder="Home Address" value="{{$user->detail->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" onchange="readURL(this);" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <img id="blah" src="{{'/storage/avatars/'. ($user->detail? $user->detail->avatar: 'boy.png')}}" alt="your image" style="width: 120px; class="respimg">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control border-input"
                                               placeholder="ex: hari@gmail.com" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control border-input"
                                               placeholder="Leave this field blank to keep same password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Driver License</label>
                                        <input type="file" name="license" onchange="readLicenseURL(this);" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <img id="license" src="{{'/storage/licenses/'. ($user->detail? $user->detail->license: '')}}" alt="license" style="width: 500px;">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <select name="payment_method" id="category" class="form-control">
                                            <option value="" disabled selected>- Select Payment Method -</option>
                                            @foreach(config('var.payment_method') as $item)
                                                <option value="{{ $item }}" {{ old('payment_method')? (Input::old('payment_method')== $item? 'selected':''): ($user->detail? ( $user->detail->payment_method == $item? 'selected':''): '') }} >{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="" disabled selected>- Select Role -</option>
                                            @foreach(config('var.role') as $role)
                                                <option @if($user->role == $role) selected="selected" @endif>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input id="status" class="form-control" readonly value="{{ $user->detail? "Completed": "Registered" }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>IsActive</label>
                                        <select name="isActive" id="isActive" class="form-control">
                                            <option value="" disabled selected>- Select IsActive -</option>
                                            <option value="1" @if($user->isActive) selected="selected" @endif>Active</option>
                                            <option value="0" @if(!$user->isActive) selected="selected" @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook_id" class="form-control border-input"
                                               placeholder="Home Address" value="{{$user->detail->facebook_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter_id" class="form-control border-input"
                                               placeholder="Home Address" value="{{$user->detail->twitter_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input type="text" name="linkedin_id" class="form-control border-input"
                                               placeholder="Home Address" value="{{$user->detail->linkedin_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram_id" class="form-control border-input"
                                               placeholder="Home Address" value="{{$user->detail->instagram_id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update User</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!--  Select Picker Plugin -->
    <script src="{{asset('backend/js/bootstrap-selectpicker.js')}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{asset('/backend/js/bootstrap-datetimepicker.js')}}"></script>
    <script>
        function readLicenseURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#license')
                        .attr('src', e.target.result)
                        .width(500);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
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
        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    </script>
@endsection

