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
                <div class="col s12 m12 l12">
                    <i class="fa fa-star fa-lg yellow-text"></i>
                    <i class="fa fa-star fa-lg yellow-text"></i>
                    <i class="fa fa-star fa-lg yellow-text"></i>
                </div>
            </div>
        </div>

        @if(Auth::user()->hasRole('member'))
            @include('dashboards.member')
        @elseif(Auth::user()->hasRole(['city_distributor', 'regional_distributor', 'admin', 'owner']))
            <div class="row">
                <div class="col l12">
                    <div class="row">
                        <div class="col right">
                            <a class="waves-effect waves-light btn-large gradient-90deg-light-blue-cyan" title="Go to Point of Sales (POS)"><i class="material-icons right">laptop_chromebook</i>Point of Sales</a> 
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
