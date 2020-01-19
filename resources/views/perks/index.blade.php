@extends('layouts.app')
@section('title', 'Perks and Payouts')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Perks and Payouts </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Perks and Payouts</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 l12">
            <div class="card-panel gradient-shadow min-height-100">
                <h6 class="header m-0">Accumulative Commissions and Incentives</h6>
                <div class="row">
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Star Sponsorship Incentive <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>5,255</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Personal Purchase Commission <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>5,255</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Team Building Inventive <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>5,255</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="col s7 m7">
                            <p>Leadership Star Bonus <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>5,255</b></h5>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="divider"></div>
                        <div class="col s7 m7">
                            <p><b>Total</b></p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><b>21,020</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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