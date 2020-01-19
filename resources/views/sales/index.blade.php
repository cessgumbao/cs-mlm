@extends('layouts.app')
@section('title', 'Sales')
@section('content')
<div class="container"> 
    <div class="row">
        <h5 class="white-text">Sales </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Sales</a>
        </div>
    </div>
</div>
@can('browse_sales')
    <div class="container"> 
        <div class="row"> 
            <div class="col s12 m12 l12">
            </div>
            <div class="row">
                <div class="col s12">
                    <div id="sale_toolbar">
                        <a class="waves-effect waves-light btn btn-small" href="{{ route('sales.create') }}"><i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <div class="card-panel">
                        <table 
                            class="table table-sm" 
                            id="sale_table" 
                            data-toolbar="#sale_toolbar"
                            data-url="/members/{{ Auth::user()->id }}/sales"
                            data-search="true"
                            data-show-search-button="true"
                            data-search-on-enter-key="true"
                            data-side-pagination="server"
                            data-pagination="true"
                            data-page-size="10"
                            data-thead-classes="center-align"
                            data-show-columns="true"
                            data-sort-name="id"
                            data-sort-order="desc"
                            data-detail-view="true"
                            data-detail-formatter="salesOrders">
                            <thead>
                                <tr> 
                                    <th class="th-inner" data-width="55" data-align="center" data-field="id" data-sortable="true">ID</th>
                                    <th class="th-inner" data-field="buyer" data-sortable="true">Purchased By</th>
                                    <th class="th-inner" data-field="total_amount" data-sortable="true" data-formatter="currencyFormatter">Total Amount</th>
                                    <th class="th-inner" data-field="discount" data-sortable="true" data-formatter="currencyFormatter">Discount</th>
                                    <th class="th-inner" data-field="net_amount" data-sortable="true" data-formatter="currencyFormatter">Net Amount</th>
                                    <th class="th-inner" data-field="ecash_amount_used" data-sortable="true" data-formatter="currencyFormatter">E-wallet Cash Used</th>
                                    <th class="th-inner" data-field="payment" data-sortable="true" data-formatter="currencyFormatter">Payment</th>
                                    <th class="th-inner" data-field="payment_change" data-sortable="true" data-formatter="currencyFormatter">Change</th>
                                    <th class="th-inner" data-align="center" data-field="created_at" data-sortable="true">Transaction Date</th>
                                    <th class="th-inner" data-align="center" data-field="action" data-formatter="actionFormatter">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@else
    <div class="container">
        <div class="row"> <div class="col s12">{!! setting('site.401_error') !!}</div> </div>
    </div>
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

function salesOrders(index, row, detail)
{
    detail.html(myLoader());

    $.get('/sales/' + row.id + '/sales_orders', function(response) {
        var html = '<table class="table centered"><thead><tr><th></th><th>Product Name</th><th>Cost</th><th>Quantity</th><th>Total Cost</th></tr></thead><tbody>';
        var orders = $.parseJSON(response);
        
        if(orders.length)
        {
            $.each(orders, function(i, val)
            {
                var image = "{!! url('storage/" + val.product.image + "') !!}";
                html += '<tr>' +
                    '<td><img alt="" src="' + image + '" width="75" height="75"></td>'+
                    '<td>' + val.product.name + '</td>'+
                    '<td>' + numeral(val.product.cost).format('0,0[.]00') + '</td>'+
                    '<td>' + val.quantity + '</td>'+
                    '<td>' + numeral(val.total_cost).format('0,0[.]00') + '</td>'+
                '</tr>';
            });
            html += '</tbody></table>';
            detail.html(html);
        }
        else detail.html('No items found')
    });
}

function actionFormatter(value, row, index) {
    return '<a class="view_invoice" href="javascript:void(0)" title="View Invoice"><i class="fa fa-receipt fa-lg"></i></a>';
}
</script>
@endsection