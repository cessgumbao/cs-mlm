@extends('layouts.app')
@section('title', 'Members')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Members </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb" href="{{ url('/members')}}">Members</a>
            <a class="breadcrumb">Create</a>
        </div>
    </div>
</div>
<div class="container">
</div>  
@endsection
@section('script')
<script>
$(function() 
{
});
</script>
@endsection