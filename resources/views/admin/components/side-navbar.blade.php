@section('side-navbar')
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="logo">
            <a href="{{URL::to('/')}}" class="simple-text">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="{{URL::to('/admin')}}" class="simple-text">
                JP
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{'/storage/avatars/'.Auth::user()->avatar}}"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        {{Auth::user()->first_name." ".Auth::user()->last_name}}
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="{{ url('admin/user/'.Auth::user()->id.'/profile') }}">Edit Profile</a></li>
                            <li><a href="{{ url('admin/user/'.Auth::user()->id.'/setting') }}">Change Password</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                @if($admin_nav)
                    @foreach($admin_nav as $item)
                        @if($item['name'] == 'User')
                        <li @if (Request::is('admin/user*'))  class="active" @endif>
                            <a data-toggle="collapse" href="#componentsExamples">
                                <i class="{{$item['icon']}}"></i>
                                <p>{{$item['name']}}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div @if (Request::is('admin/user*'))  class="collapse in" @else class="collapse" @endif id="componentsExamples">
                                <ul class="nav">
                                    <li @if (Request::is('admin/user/customer*')) class="active" @endif><a href="{{ url($item['actions']['customer'])}}">Customer</a></li>
                                    <li @if (Request::is('admin/user/company*')) class="active" @endif><a href="{{ url($item['actions']['company'])}}">Company</a></li>
                                    @if(Auth::user()->super_admin)
                                        <li @if (Request::is('admin/user/administrator*')) class="active" @endif><a href="{{ url($item['actions']['administrator'])}}">Administrator</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @elseif(array_key_exists('room_booking', $item['actions']) || array_key_exists('event_booking', $item['actions']))
                            <li @if (Request::is('admin/'.strtolower($item['name']).'/*')) class="active" @endif>
                                <a data-toggle="collapse" href="#componentsExamples">
                                    <i class="{{$item['icon']}}"></i>
                                    <p>{{$item['name']}}
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div @if (Request::is('admin/'.strtolower($item['name']).'/*')) class="collapse in" @else class="collapse" @endif id="componentsExamples">
                                    <ul class="nav">
                                        <li @if (Request::is('admin/'.strtolower($item['name']).'/room_booking')) class="active" @endif><a href="{{ url($item['actions']['room_booking'])}}">Room Bookings</a></li>
                                        <li @if (Request::is('admin/'.strtolower($item['name']).'/event_booking')) class="active" @endif><a href="{{ url($item['actions']['event_booking'])}}">Event Bookings</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li @if (Request::is('admin/'.strtolower($item['name']).'/*')) class="active" @endif>
                                <a href="{{ url($item['actions']['view'])}}">
                                    <i class="{{$item['icon']}}"></i>
                                    <p>{{$item['name']}}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@show