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
            <section class="tabs-vertical section">
                <div class="row">
                    <div class="col s12 l4">
                        <div class="card-panel">
                            <ul class="tabs">
                                <li class="tab">
                                  <a href="#general" class="active">
                                    <i class="material-icons">brightness_low</i>
                                    <span>General</span>
                                  </a>
                                </li>
                                <li class="tab">
                                  <a href="#change-password" class="">
                                    <i class="material-icons">lock_open</i>
                                    <span>Change Password</span>
                                  </a>
                                </li>
                                <li class="tab">
                                  <a href="#info" class="">
                                    <i class="material-icons">error_outline</i>
                                    <span> Info</span>
                                  </a>
                                </li>
                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col l8 s12">
                        <!-- tabs content -->
                        <div id="general" class="active" style="display: block;">
                            <div class="card-panel">
                                <div class="display-flex">
                                    <div class="media">
                                        <img class="responsive-img portrait" src="{{ url('storage/' . $profile->avatar ) }}" height="64" width="64" alt>
                                    </div>
                                    <div class="media-body">
                                        <div class="file-field input-field">
                                        <div class="btn waves-effect waves-light gradient-90deg-light-blue-cyan mr-2">
                                            <span>Upload new photo</span>
                                            <input type="file">
                                        </div>
                                            <button class="right waves-effect waves-light btn-flat green-text" disabled>Save <i class="fa fa-check"></i></button>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider mb-1 mt-1"></div>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field">
                                            <label for="name" class="active">Name</label>
                                            <input id="name" name="name" type="text" value="Hermione Granger" disabled>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <label for="email" class="active">E-mail</label>
                                            <input id="email" type="email" name="email" value="granger007@hogward.com" disabled>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <label for="email" class="active">Rank</label>
                                            <input id="email" type="email" name="email" value="3-star Reseller" disabled>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <label for="email" class="active">Member's Discount</label>
                                            <input id="email" type="email" name="email" value="25%" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="change-password" style="display: none;" class="">
                            <div class="card-panel">
                                <form class="paaswordvalidate" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="input-field">
                                            <input id="oldpswd" name="oldpswd" type="password" data-error=".errorTxt4">
                                            <label for="oldpswd">Old Password</label>
                                            <small class="errorTxt4"></small>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                            <input id="newpswd" name="newpswd" type="password" data-error=".errorTxt5">
                                            <label for="newpswd">New Password</label>
                                            <small class="errorTxt5"></small>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                            <input id="repswd" type="password" name="repswd" data-error=".errorTxt6">
                                            <label for="repswd">Retype new Password</label>
                                            <small class="errorTxt6"></small>
                                            </div>
                                        </div>
                                        <div class="col s12 display-flex justify-content-end form-action">
                                            <button type="submit" class="btn waves-effect waves-light gradient-90deg-light-blue-cyan mr-2">Save changes</button>
                                            <button type="reset" class="btn gradient-90deg-red-pink waves-effect waves-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="info" style="display: none;" class="">
                            <div class="card-panel">
                                <form class="infovalidate">
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="input-field">
                                                <label for="nickname" class="active">Nickname</label>
                                                <input id="nickname" name="nickname" type="text" value="Herminger">
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                                <label for="birtdate" class="active">Birthdate</label>
                                                <input type="text" class="datepicker">
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                                <label for="address" class="active">Address</label>
                                                <input type="text" name="address" value="">
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                                <select name="city" id="city">
                                                    <option value=""></option>
                                                </select>
                                                <label for="city" class="center-align">City *</label>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                                <select name="region" id="region">
                                                    <option value=""></option>
                                                </select>
                                                <label for="region" class="center-align">Region *</label>
                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field">
                                                <input id="phone-num" type="text" class="validate" value="(+656) 254 2568">
                                                <label for="phone-num" class="active">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col s12 display-flex justify-content-end form-action">
                                            <button type="submit" class="btn waves-effect waves-light gradient-90deg-light-blue-cyan mr-2">Save changes</button>
                                            <button type="button" class="btn gradient-90deg-red-pink waves-effect waves-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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
$(function() 
{
    $('.tabs').tabs();
    
    $.each(cities, function(i, val) {
        var selected = "{{ old('city') }}" == val.name  ? 'selected' : '';

        if (val.city)
            $('select#city').formSelect().append('<option value="' + val.name + '" ' + selected + '>' + val.name + '</option>');
    })

    $.each(regions, function(i, val) {
        var selected = "{{ old('region') }}" == val.name  ? 'selected' : '';
        $('select#region').formSelect().append('<option value="' + val.name + '" ' + selected + '>' + val.name + " - " + val.long + '</option>');
    })
});
</script>
@endsection