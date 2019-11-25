@extends('layouts.head')
@section('app')
<header class="grey lighten-4">
    <div class="navbar-fixed">
        <nav>  
            <div class="nav-wrapper white">  
                <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons teal-text lighten-1">menu</i></a>
                <ul id="nav-mobile" class="right">  
                    <li><a href="#"><i class="fa fa-bell fa-1x teal-text lighten-1"></i></a></li>  
                    <li><a href="#"><i class="fa fa-user fa-1x teal-text lighten-1"></i></a></li>  
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt fa-1x teal-text lighten-1"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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
    <div id="app">@yield('content')</div> 
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