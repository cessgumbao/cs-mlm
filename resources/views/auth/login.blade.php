@extends('layouts.head')
@section('title', 'Login')
@section('app')
<div id="app" class="valign-wrapper deep-orange lighten-1">
    <div class="container">
        <div class="row">
            <div class="col s12 m4 offset-m4 z-depth-4 card-panel">
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12 center">
                        <img src="{{ Voyager::image(Voyager::setting('site.logo', '')) }}" alt="" class="responsive-img valign profile-image-login" width="100">
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="fa fa-user fa-lg grey-text prefix"></i>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="row">          
                        <div class="input-field col s12 m12 l12  login-text">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="{{ route('register') }}">Be a member!</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif
                            </p>
                        </div>          
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
