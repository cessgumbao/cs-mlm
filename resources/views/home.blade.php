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
    @endif
</div>  
@endsection