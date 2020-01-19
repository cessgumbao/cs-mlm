@extends('layouts.app')
@section('title', 'Purchases')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Purchases </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Purchases</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 l12">
            <div class="card-panel gradient-shadow min-height-100">
                <h6 class="header m-0">Report for the month of <b>December</b></h6>
                <div class="row">
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Personal Purchases</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>690</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Group Purchases</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>690</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="divider"></div>
                        <div class="col s7 m7">
                            <p>Total Purchases</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>1,380</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h6 class="header m-0">Purchase History</h6>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#personal_purchase_tab">Personal</a></li>
                            <li class="tab col s3"><a href="#group_purchase_tab">Group</a></li>
                        </ul>
                    </div>
                    <div id="personal_purchase_tab" class="col s12">
                        <div id="personal_purchase_toolbar">
                        </div>
                        <table id="personal_purchase_table"
                            class="table highlight" 
                            data-toolbar="#personal_purchase_toolbar"
                            data-search="true"
                            data-show-search-button="true"
                            data-pagination="true">
                            <thead>
                                <tr> 
                                    <th data-field="id" data-sortable="true">#</th>
                                    <th data-field="seller_id" data-sortable="true">Seller ID</th>
                                    <th data-field="gross_amount" data-sortable="true">Gross Amount</th>
                                    <th data-field="net_amount" data-sortable="true">Net Amount</th>
                                    <th data-field="pcc" data-sortable="true">PCC</th>
                                    <th data-field="created_at" data-sortable="true">Transaction Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="group_purchase_tab" class="col s12">
                        <div id="group_purchase_toolbar">
                        </div>
                        <table id="group_purchase_table"
                            class="table highlight" 
                            data-toolbar="#group_purchase_toolbar"
                            data-search="true"
                            data-show-search-button="true"
                            data-pagination="true">
                            <thead>
                                <tr> 
                                    <th data-field="id" data-sortable="true">#</th>
                                    <th data-field="member_id" data-sortable="true">Member ID</th>
                                    <th data-field="gross_amount" data-sortable="true">Gross Amount</th>
                                    <th data-field="net_amount" data-sortable="true">Net Amount</th>
                                    <th data-field="seller_id" data-sortable="true">Seller ID</th>
                                    <th data-field="created_at" data-sortable="true">Transaction Date</th>
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
    $('#personal_purchase_table').bootstrapTable();
    $('#group_purchase_table').bootstrapTable();
});
</script>
@endsection