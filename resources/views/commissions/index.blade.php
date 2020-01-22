@extends('layouts.app')
@section('title', 'Commissions')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Commissions </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Commissions</a>
        </div>
    </div>
</div>
<div class="container">
    @can('add_payouts')
        <div class="row mb-1">
            <div class="col right">
                <a href="#" class="btn waves-effect waves-light"><i class="fa fa-hand-holding-usd"></i> Payout</a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col s12">
            <div id="payout_toolbar">

            </div>
            <div class="card-panel">
                <h6 class="header m-0">Payouts History</h6>
                <table id="payout_table" 
                    class="table table-sm"
                    data-search="true"
                    data-show-search-button="true"
                    data-search-on-enter-key="true"
                    data-toolbar="#payout_toolbar"
                    data-url="/cs/payouts"
                    data-side-pagination="server"
                    data-pagination="true"
                    data-page-size="10">
                    <thead>
                        <tr> 
                            <th data-field="reference_no" data-sortable="true">Reference No.</th>
                            <th data-field="payout_amount" data-sortable="true">Payout Amount</th>
                            <th data-field="released_by" data-sortable="true">Released By</th>
                            <th data-field="created_at" data-sortable="true">Date Released</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>  
@endsection
@section('script')
<script>
$(function() 
{
    $('#payout_table').bootstrapTable();
});
</script>
@endsection