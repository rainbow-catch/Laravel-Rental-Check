<?php $navbar = [
    'complaint' => [
        'name' => 'complaint',
        'view'=>'admin/complaint',
        'icon' => 'fa fa fa-comments'
    ],
    'membership' => [
        'name' => 'membership',
        'view'=>'admin/membership',
        'icon' => 'fa fa fa-group'
    ],
    'payment_method' => [
        'name' => 'payment',
        'view'=>'admin/payment_method',
        'icon' => 'fa fa fa-paypal'
    ],
];
?>
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
                    <img src="{{'/storage/avatars/'.Auth::user()->detail->avatar}}"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        {{Auth::user()->fullName()}}
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="{{ route('profile') }}">Edit Profile</a></li>
                            <li><a href="{{ route('password') }}">Change Password</a></li>
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
                <li class="{{ Request::is('admin/user*')? 'active' : '' }}">
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="fa fa fa-user"></i>
                        <p>User
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="{{ Request::is('admin/user*')? 'collapse in': 'collapse' }}" id="componentsExamples">
                        <ul class="nav">
                            <li class="{{ Request::is('admin/user/customer*')?'active' : '' }}"><a href="{{ url('admin/user/customer')}}">Customer</a></li>
                            <li class="{{ Request::is('admin/user/company*')?'active' : '' }}"><a href="{{ url('admin/user/company')}}">Company</a></li>
                            @if(Auth::user()->super_admin)
                                <li class="{{ Request::is('admin/user/administrator*')?'active' : '' }}"><a href="{{ url('admin/user/administrator')}}">Administrator</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="{{ Request::is('admin/user/category*')?'active' : '' }}">
                    <a data-toggle="collapse" href="#componentsCategories">
                        <i class="fa fa fa-tags"></i>
                        <p>Category
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="{{ Request::is('admin/category*')? 'collapse in': 'collapse' }}" id="componentsCategories">
                        <ul class="nav">
                            <li class="{{ Request::is('admin/category*') && !Request::is('admin/category/incident*')? 'active': '' }}" ><a href="{{ url('admin/category')}}">Category</a></li>
                            <li class="{{ Request::is('admin/category/incident*')? 'active': '' }}" ><a href="{{ url('admin/category/incident')}}">Incident</a></li>
                        </ul>
                    </div>
                </li>
                @foreach($navbar as $item)
                <li class="{{ Request::is('admin/'.strtolower($item['name']).'*')? 'active': '' }}">
                    <a href="{{ url($item['view'])}}">
                        <i class="{{$item['icon']}}"></i>
                        <p>{{$item['name']}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@show