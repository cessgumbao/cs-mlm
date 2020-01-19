@extends('layouts.head')
@section('app')
<header>
    <div class="navbar navbar-fixed">
        <nav class="navbar-dark gradient-90deg-deep-orange-orange no-shadow">  
            <div class="nav-wrapper">  
                <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons white-text lighten-1">menu</i></a>
                <div class="left header-search-wrapper hide-on-med-and-down" style="width: 40%; margin-left: 320px;">
                    <i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Search here">
                </div>
                <ul id="nav-mobile" class="right">  
                    <li>
                        <a href="#" class="waves-effect waves-block waves-light navbar-dropdown-trigger" data-target='notifications-dropdown' title="Notifications"><i class="material-icons">notifications_none <small class="notification-badge">5</small></i></a>
                        <ul id='notifications-dropdown' class='dropdown-content'>
                            <li><a href="javascript:void()" class="grey-text text-darken-1 waves-effect waves-block waves-light"><h6>NOTIFICATIONS <span class="new badge">5</span></h6></a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1 waves-effect waves-block waves-light"><i class="material-icons icon-bg-circle cyan small">view_module</i>Sample Notification1</a>
                                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1 waves-effect waves-block waves-light"><i class="material-icons icon-bg-circle red small">cloud</i>Sample Notification1</a>
                                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1 waves-effect waves-block waves-light"><i class="material-icons icon-bg-circle amber small">timeline</i>Sample Notification1</a>
                                <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                        </ul>
                    </li>  
                     
                    <li>
                        <a href="javascript:alert('This page is under construction')" class="waves-effect waves-block waves-light" title="FAQs"><i class="material-icons">help_outline</i></a>
                    </li>  
                    <li>                      
                        <a href="#" class="navbar-dropdown-trigger waves-effect waves-block waves-light" data-target="profile-dropdown">
                            <span class="avatar-status avatar-online">
                                <img src="{{ url('storage/' . Auth::user()->avatar ) }}" alt="avatar" style="margin-top: 10px;">
                                <i></i>
                            </span>
                        </a>
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li>
                                <a class="grey-text text-darken-1 waves-effect waves-block waves-light" href="{{ route('member.profile', ['member_id' => encrypt(Auth::user()->members->id)]) }}"><i class="material-icons">person_outline</i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="grey-text text-darken-1 waves-effect waves-block waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="material-icons">keyboard_tab</i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>  
                </ul>  
            </div>  
        </nav>      
    </div>
    
    <!-- Side menu -->
    @if ( Auth::user()->hasRole(['owner', 'admin']) )
        {{ menu('owner_menu', 'partials.side_menu') }}
    @elseif ( Auth::user()->hasRole(['city_distributor', 'regional_distributor']) )
        {{ menu('distributor_menu', 'partials.side_menu') }}
    @elseif ( Auth::user()->hasRole('member') )
        {{ menu('member_menu', 'partials.side_menu') }}
    @elseif ( Auth::user()->hasRole('user') )
        {{ menu('user_menu', 'partials.side_menu') }}
    @endif

</header>

<main> 
    <div class="content-wrapper-before gradient-90deg-deep-orange-orange"></div>
    <div id="app">
        @yield('content')
    </div> 
</main>

<footer class="page-footer white">
    <div class="preloader-wrapper small">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
    <!-- <div class="footer-copyright">
        <div class="container">
            © 2019 Copyright Text
        </div>
    </div> -->
</footer>
@endsection