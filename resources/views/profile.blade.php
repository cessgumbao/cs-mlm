@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="container"> 
    <div class="row">
        <h5 class="white-text">User Profile </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">User Profile</a>
        </div>
    </div>
    <div class="row"> 
        <div class="col s12">
            <div class="row">
                <div class="col s12 m3 l3">
                    <div class="container">
                        <div class="row center">
                            <div class="col s12 m12 l12">
                                <div class="thumbnail circle z-depth-5">
                                    <img class="responsive-img portrait" src="{{ url('storage/' . $profile->avatar ) }}" alt>
                                </div>
                                <button class="btn btn-small"><i class="fa fa-image"></i> Change Photo</button>
                            </div>
                        </div>
                        <div class="row center">
                            <i class="fa fa-star orange-text"></i>
                        </div>
                    </div>
                </div>
                <div class="col s12 m9 l9">
                    <div class="card-panel" id="profile_card">
                        <div class="row">
                            <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s6 m6"><a class="active grey-text text-darken-1 waves-effect" href="#test1"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                                    <li class="tab col s6 m6"><a class=" grey-text text-darken-1 waves-effect" href="#test2"><i class="fa fa-lock fa-lg"></i> Security</a></li>
                                </ul>
                            </div>
                            <div id="test1" class="col s12">
                                <div class="row">
                                    <div class="col s3 m3 l3">
                                        <strong>
                                            <p> Name:</p>
                                            <p> Region:</p>
                                            <p> City:</p>
                                        </strong>
                                    </div>
                                    <div class="col s9 m9 l9">
                                        <p>{{ $profile->name }}</p>
                                        <p>{{ $profile->region }}</p>
                                        <p>{{ $profile->city }}</p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s3 m3 l3">
                                        <strong>
                                            <p></i> Rank:</p>
                                            <p></i>Role:</p>    
                                        </strong>
                                    </div>
                                    <div class="col s9 m9 l9">
                                        <p>{{ $profile->rank ?? "-" }}</p>
                                        <p>{{ $profile->role ?? "-" }}</p>
                                    </div>
                                </div>
                            </div>
                            <div id="test2" class="col s12">Security</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('style')
<style>
#profile_card { font-size: 18px ;}
</style>
@endsection
@section('script')
<script>
$(function() {

    $('.tabs').tabs();
});
</script>
@endsection