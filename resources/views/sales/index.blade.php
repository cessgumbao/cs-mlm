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
        <div class="col s12 m12 l12">
            <h5><i class="fa fa-file-invoice-dollar"></i> Sales </h5>
        </div>
        <div class="row">
            <div class="col s12">
                <div id="sale_toolbar">
                    <a class="waves-effect waves-light btn" href="{{ route('sales.create') }}"><i class="fa fa-plus"></i> Create New</a>
                </div>
                <div class="card-panel">
                    <table 
                        class="table table-sm" 
                        id="sale_table" 
                        data-toolbar="#sale_toolbar"
                        data-url="/sales/my-sales/all"
                        data-search="true"
                        data-show-search-button="true"
                        data-search-on-enter-key="true"
                        data-side-pagination="server"
                        data-pagination="true"
                        data-page-size="10"
                        data-thead-classes="center-align">
                        <thead>
                            <tr> 
                                <th class="th-inner center-align" data-field="id" data-sortable="true">ID</th>
                                <th class="th-inner" data-field="buyer" data-sortable="true">Purchased By</th>
                                <th class="th-inner" data-field="total_amount" data-sortable="true" data-formatter="currencyFormatter">Total Amount</th>
                                <th class="th-inner" data-field="discount" data-sortable="true" data-formatter="currencyFormatter">Discount</th>
                                <th class="th-inner" data-field="net_amount" data-sortable="true" data-formatter="currencyFormatter">Net Amount</th>
                                <th class="th-inner" data-field="ecash_amount_used" data-sortable="true" data-formatter="currencyFormatter">E-wallet Cash used</th>
                                <th class="th-inner" data-field="payment" data-sortable="true" data-formatter="currencyFormatter">Payment</th>
                                <th class="th-inner" data-field="payment_change" data-sortable="true" data-formatter="currencyFormatter">Change</th>
                                <th class="th-inner center-align" data-field="created_at" data-sortable="true">Transaction Date</th>
                                <th class="th-inner center-align" data-field="action">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
@else
    <div class="row"> <div class="col s12">{!! setting('site.401_error') !!}</div> </div>
@endcan
@endsection
@section('style')
<style>
    #sale_table { font-size: 12px; }
</style>
@endsection
@section('script')
<script>
$(function() 
{
    var session_status = "{{ session('status') }}";
    if(session_status) M.toast({html: '<i class="fa fa-check"></i> ' + session_status, classes: 'toast-success'});
    $('#sale_table').bootstrapTable();
});

function currencyFormatter(value)
{
    return "<div class='right-align green-text text-darken-2'>" + numeral(value).format('0,0[.]00') + "</div>";
}
</script>
@endsection