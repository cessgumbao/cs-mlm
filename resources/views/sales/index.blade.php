@extends('layouts.app')
@section('title', 'Sales')
@section('content')
@can('browse_sales')
<div class="container"> 
    <div class="row">
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Sales</a>
        </div>
    </div>
    <div class="row"> 
        <div class="valign-wrapper">
            <div class="col s9 m6 l6">
                <h5><i class="fa fa-file-invoice-dollar"></i> Sales </h5>
            </div>
            <div class="col s3 m6 l6 right-align">
                <a class="waves-effect waves-light btn" href="{{ route('sales.create') }}"><i class="fa fa-plus"></i> Create New</a>
            </div>
                   
        </div>
        <div class="row">
            <div class="col s12">
                <table class="centered" id="sale_table">
                    <thead>
                        <tr> 
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="buyer" data-sortable="true">Purchased By</th>
                            <th data-field="total_amount" data-sortable="true">Total Amount</th>
                            <th data-field="discount" data-sortable="true">Discount</th>
                            <th data-field="net_amount" data-sortable="true">Net Amount</th>
                            <th data-field="ecash_amount_used" data-sortable="true">E-wallet Cash used</th>
                            <th data-field="payment" data-sortable="true">Payment</th>
                            <th data-field="payment_change" data-sortable="true">Change</th>
                            <th data-field="created_at" data-sortable="true">Transaction Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> 
</div>
    
@else
    <div class="row"> <div class="col s12">{!! setting('site.401_error') !!}</div> </div>
@endcan
@endsection
@section('script')
<script>
$(function() 
{
    var session_status = "{{ session('status') }}";
    if(session_status) M.toast({html: '<i class="fa fa-check"></i> ' + session_status, classes: 'toast-success'});

    $('#sale_table').bootstrapTable({
        classes : ['table', 'highlight', 'centered'],
        toggle: "table",
        url: '/sales/my-sales/all',
        search: true, 
        sidePagination: "server",
        pagination: true,
    });
});
</script>
@endsection