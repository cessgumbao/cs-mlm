@extends('layouts.head')
@section('title', 'Register')
@section('app')
<div class="valign-wrapper deep-orange lighten-1">
    <div class="container">
        <form class="register-form z-depth-4 card-panel" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col s12 center">
                <img src="{{ Voyager::image(Voyager::setting('site.logo', '')) }}" alt="" class="responsive-img valign profile-image-login" width="100">
                </div>
            </div>
            <div class="row center">
                <h5>Membership</h5>
            </div>
            <!-- <div class="row">
                <h6>Please select your scheme:</h6>
                <div class="valign-wrapper">
                    <div class="col s12 card scheme grey lighten-5">
                        <div class="row">
                            <label>
                                <input class="with-gap" name="group1" type="radio" checked />
                                <span>3-star</span>
                            </label>
                        </div>
                        <div class="row center">
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                        </div>
                        <div class="row center-align">
                            <span class="grey-text">2 sets of Spectra Package</span>
                        </div>
                    </div>
                    <div class="col s12 card scheme grey lighten-5">
                        <div class="row">                    
                            <label>
                                <input class="with-gap" name="group1" type="radio" />
                                <span>4-star</span>
                            </label>
                        </div>
                        <div class="row center">
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                        </div>
                        <div class="row center-align">
                            <span class="grey-text">Minimum purchase of Php 25,000 worth of products</span>
                        </div>
                    </div>
                    <div class="col s12 card scheme grey lighten-5">
                        <div class="row">
                            <label>
                                <input class="with-gap" name="group1" type="radio" />
                                <span>5-star</span>
                            </label>
                        </div>
                        <div class="row center">
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                            <i class="fa fa-star yellow-text"></i>
                        </div>
                        <div class="row center-align">
                            <span class="grey-text">Minimum purchase of Php 50,000 worth of products</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col s12">
                    <div class="row margin">
                        <div class="input-field col s12">
                            <input id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') }}" autocomplete="referral_code" autofocus>
                            <label for="referral_code" class="center-align">Referral Code</label>
                            @error('referral_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12 m4 l4">
                            <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
                            <label for="first_name" class="center-align">First Name</label>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <input id="middle_name" type="text" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name">
                            <label for="name" class="center-align">Middle Name</label>
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <input id="last_name" type="text" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                            <label for="last_name" class="center-align">Last Name</label>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12 m4 l4">
                            <input id="address" type="text" name="address" value="{{ old('address') }}" class="@error('last_name') is-invalid @enderror" required autocomplete="address">
                            <label for="address" class="center-align">Address</label>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <select name="city" id="city">
                                <option value=""></option>
                            </select>
                            <label for="city" class="center-align">City</label>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <select name="region" id="region">
                                <option value=""></option>
                            </select>
                            <label for="region" class="center-align">Region</label>
                            @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <select name="gender" id="gender">
                                <option value=""></option>
                                <option value="Male" {{ old('gender') == "Male" ? "selected" : ""}}>Male</option>
                                <option value="Female" {{ old('gender') == "Female" ? "selected" : ""}}>Female</option>
                            </select>
                            <label for="gender" class="center-align">Gender</label>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <input id="birthdate" type="text" class="datepicker" name="birthdate" value="{{ old('birthdate') }}" autocomplete="birthdate">
                            <label for="birthdate" class="center-align">Birthdate</label>
                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="fa fa-envelope fa-lg grey-text prefix"></i>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email" class="center-align">E-mail</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="fa fa-lock fa-lg grey-text prefix"></i>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                            <label for="password" class="center-align">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="fa fa-lock fa-lg grey-text prefix"></i>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm">Confirm Password</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button id="register" type="submit" class="btn waves-effect waves-light col s12 m3 offset-m9">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('style')
<style>
.scheme {
    height: 150px;
    padding: 20px !important;
    margin: 10px;
    font-size: 1vw;
}
</style>
@endsection
@section('script')
<script>
$(function() 
{
    $.each(cities, function(i, val) {
        var selected = "{{ old('city') }}" == val.name  ? 'selected' : '';

        if (val.city)
            $('select#city').formSelect().append('<option value="' + val.name + '" ' + selected + '>' + val.name + '</option>');
    })

    $.each(regions, function(i, val) {
        var selected = "{{ old('region') }}" == val.name  ? 'selected' : '';
        $('select#region').formSelect().append('<option value="' + val.name + '" ' + selected + '>' + val.name + " - " + val.long + '</option>');
    })

    $('body').on('submit', '#register', function() {
        event.preventDefault();
    });
});

// function registerMember()
// {
//     $.post('/members')
// }
</script>
@endsection