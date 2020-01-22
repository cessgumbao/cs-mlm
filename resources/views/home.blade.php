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
            <div class="row mb-1">
                <div class="col right">
                    <a href="#" class="btn waves-effect waves-light"><i class="fa fa-coins"></i> DIRECT SELL</a>
                    <a href="#" class="btn waves-effect waves-light"><i class="fa fa-user-plus"></i> REGISTER A RESELLER</a>
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
@section('style')
<style>
    .dashboard_menu .card:hover { 
        -webkit-box-shadow: 0 6px 20px 0 rgba(255, 204, 188, .5) !important;
        box-shadow: 0 6px 20px 0 rgba(255, 204, 188, .5) !important;
        background: #ffffff;
        background: -webkit-linear-gradient(45deg, #ffffff, #ffb74b) !important;
        background: -moz- oldlinear-gradient(45deg, #ffffff, #ffb74b) !important;
        background: -o-linear-gradient(45deg, #ffffff, #ffb74b) !important;
        background: linear-gradient(45deg, #ffffff, #ffb74b) !important;
    }
</style>
@endsection