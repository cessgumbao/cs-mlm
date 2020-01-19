@extends('layouts.app')
@section('title', 'Members')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Members </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Members</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 l4">
            <div class="card-panel">
                <h6 class="header m-0">Graph</h6>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <canvas id="members" height="225">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 l8">
            <div class="card-panel gradient-shadow min-height-100">
                <h6 class="header m-0">Members</h6>
                <div class="row">
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>3-star Resellers</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>3</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>4-star Resellers</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>1</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>5-star Resellers</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>1</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="divider"></div>
                        <div class="col s7 m7">
                            <p>Total</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>5</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h6 class="header m-0">My Network</h6>
                <div class="row">
                    <div class="col s12">
                        @can('add_members')
                            <a class="waves-effect waves-light btn btn-small modal-trigger gradient-90deg-light-blue-cyan right" href="#register_reseller"><i class="fa fa-plus"></i> Register a Reseller</a>
                        @endcan
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#all_members_tab">All</a></li>
                            <li class="tab col s3"><a href="#direct_recruits_tab">Direct Recruits</a></li>
                        </ul>
                    </div>
                    <div id="all_members_tab" class="col s12">
                        <div id="member_toolbar">
                        </div>
                        <table id="all_members_table" 
                            class="table table-sm"
                            data-search="true"
                            data-show-search-button="true"
                            data-search-on-enter-key="true"
                            data-toolbar="#member_toolbar"
                            data-url="/cs/members"
                            data-side-pagination="server"
                            data-pagination="true"
                            data-page-size="10">
                            <thead>
                                <tr> 
                                    <th data-field="member_id" data-sortable="true">Member ID</th>
                                    <th data-field="member_name" data-sortable="true">Name</th>
                                    <th data-field="rank" data-sortable="true">Rank</th>
                                    <th data-field="sponsor_id" data-sortable="true">Sponsor ID</th>
                                    <th data-field="created_at" data-sortable="true">Date Joined</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="direct_recruits_tab" class="col s12">
                        <div id="direct_recruits_toolbar">
                        </div>
                        <table id="direct_recruits_table" 
                            class="table table-sm"
                            data-search="true"
                            data-show-search-button="true"
                            data-search-on-enter-key="true"
                            data-toolbar="#direct_recruits_toolbar"
                            data-url="/cs/members"
                            data-side-pagination="server"
                            data-pagination="true"
                            data-page-size="10">
                            <thead>
                                <tr> 
                                    <th data-field="member_id" data-sortable="true">Member ID</th>
                                    <th data-field="member_name" data-sortable="true">Name</th>
                                    <th data-field="rank" data-sortable="true">Rank</th>
                                    <th data-field="sponsor_id" data-sortable="true">Sponsor ID</th>
                                    <th data-field="created_at" data-sortable="true">Date Joined</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>  
@endsection
@section('script')
<script>
$(function() 
{
    $('.tabs').tabs();
    $('#all_members_table').bootstrapTable();
    $('#direct_recruits_table').bootstrapTable();
    var members_chart = $('#members');
    
    new Chart(members_chart, {
        type: 'doughnut',
        data: {
            labels: ['3-star', '4-star', '5-star'],
            datasets: [
                {
                    data: [12, 3, 5],
                    backgroundColor: [ '#f75353', '#6d6dfd', '#fbfb53']
                },
            ]
        },
        options: { },
    });
});
</script>
@endsection