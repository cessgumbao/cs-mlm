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
    @else
        <div class="row">
            <h5 class="white-text">Dashboard </h5>
            <div class="col s12 m12 l12">
                <a class="breadcrumb">Dashboard</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card gradient-90deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="fa-2x material-icons background-round mt-5">timeline</i>
                                <p>Monthly Sales</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text"><b>690</b></h5>
                                <p class="no-margin">December</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card gradient-90deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="fa-2x material-icons background-round mt-5">person_outline</i>
                                <p>Downline</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text"><b>20</b></h5>
                                <p class="no-margin">Total</p>
                                <p>1st-level</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card gradient-90deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="fa fa-money-bill-wave fa-2x background-round mt-5"></i>
                                <p>Overriding Commissions</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text"><b>5,000</b></h5>
                                <p class="no-margin">Total</p>
                                <p>(OC)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m8 l8">
                <div class="card-panel">
                    <h6 class="header m-0">Personal Group Paid-in Sales <a class="waves-effect waves-light btn right">Details</a></h6>
                    <canvas id="personal_group_sales">Your browser does not support the canvas element.</canvas>
                </div>
                
            </div>
            <div class="col s12 m4 l4">
                <div class="card-panel">
                    <h6 class="header m-0">Total Members</h6>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <canvas id="members" width="100" height="114">Your browser does not support the canvas element.</canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h6 class="header m-0">Latest Group Paid-in Sales <a class="waves-effect waves-light btn right">See All</a></h6>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <table class="table table-sm" 
                                id="pgs_table"
                                data-page-size="5"
                                data-thead-classes="center-align"
                                data-sort-name="id"
                                data-sort-order="desc">
                                <thead> 
                                    <tr>
                                        <th width="30">Name</th>
                                        <th width="20">City</th>
                                        <th width="10">Rank</th>
                                        <th width="20">Date</th>
                                        <th width="10">Net Amount</th>
                                        <th width="10">OC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Makati City</td>
                                        <td><span class="new badge green lighten-2" data-badge-caption="star"> 3</span></td>
                                        <td>10/12/2019</td>
                                        <td>25,000</td>
                                        <td>2,000</td>
                                    </tr>
                                    <tr>
                                        <td>Austin Yu</td>
                                        <td>Pasay City</td>
                                        <td><span class="new badge orange lighten-2" data-badge-caption="star"> 4</span></td>
                                        <td>10/12/2019</td>
                                        <td>25,000</td>
                                        <td>2,000</td>
                                    </tr>
                                    <tr>
                                        <td>Mary Jane</td>
                                        <td>Taguig City</td>
                                        <td><span class="new badge purple lighten-2" data-badge-caption="star"> 5</span></td>
                                        <td>10/12/2019</td>
                                        <td>25,000</td>
                                        <td>2,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endif
</div>  
@endsection
@section('script')
<script>
$(function() {
    var pgs_chart = $('#personal_group_sales');
    var members_chart = $('#members');

    $('#pgs_table').bootstrapTable();
    new Chart(pgs_chart, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Group Sales',
                    data: [12, 3, 5, 2, 3,12, 3, 5, 2, 3, 7,8],
                    borderColor: 'orange',
                    borderWidth: 3,
                    fill: false
                },
                {
                    label: 'Net Paid-in Sales',
                    data: [5, 20, 1, 3, 23, 12, 3, 5, 2,3,12, 10],
                    borderColor: '#f75353',
                    borderWidth: 3,
                    fill: false
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                }],
                xAxes: [{
                    gridLines: { display: false},
                }],
            },
        },
    });

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