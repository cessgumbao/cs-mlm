@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    @if(Auth::user()->hasRole('user'))
    <!-- Make this a news letter in the future -->
        <div class="row card">
            <div class="col s12 deep-orange lighten-5 red-text text-darken-2"> 
                <p><b> TO ONLINE REGISTRANTS: </b></p>
                <p> Please go to your nearest distributor, complete a purchase and start enjoying your benefits as a member </p>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col l6">
                <h5 class="white-text">Dashboard </h5>
                <div class="col s12 m12 l12">
                    <a class="breadcrumb">Dashboard</a>
                </div>
            </div>
            <div class="right">
                <h5 class="white-text">{{ Auth::user()->role->display_name }}</h5>
                @if (Auth::user()->role->display_name == 'Reseller')
                    <div class="col s12 m12 l12">
                        <i class="fa fa-star fa-lg yellow-text"></i>
                        <i class="fa fa-star fa-lg yellow-text"></i>
                        <i class="fa fa-star fa-lg yellow-text"></i>
                    </div>
                @endif
            </div>
        </div>

        @if(Auth::user()->hasRole('member'))
            @include('dashboards.member')
        @elseif(Auth::user()->hasRole(['city_distributor', 'regional_distributor', 'admin', 'owner']))
            <div class="row">
                <div class="col s12 m6">
                    <div class="card gradient-45deg-white-orange border-radius-3">
                        <div class="card-content">
                            <img src="{{ url('storage/coin.png' ) }}" alt="images" width="50">
                        <h5 class="lighten-4 white-text right">DIRECT SELL</h5>
                        <!-- <p class="white-text lighten-4">On apple watch</p> -->
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card gradient-45deg-white-orange border-radius-3">
                        <div class="card-content">
                        <img src="{{ url('storage/user.png' ) }}" alt="images" width="50">
                        <h5 class="lighten-4 white-text right">REGISTER A RESELLER</h5>
                        <!-- <p class="white-text lighten-4">On apple watch</p> -->
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->hasRole(['city_distributor', 'regional_distributor']))
                @include('dashboards.member')
            @else
                @include('dashboards.admin')
            @endif
        @endif
    @endif
</div>  
@endsection
