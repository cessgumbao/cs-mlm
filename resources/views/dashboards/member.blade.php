<!-- Personal Purchases | Group Team Purchases | Current Members -->
<div class="row">
    <div class="col s12 m4 l4">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col s7 m7">
                        <i class="fa fa-hand-holding-usd fa-2x background-round mt-5 gradient-90deg-deep-orange-orange white-text"></i>
                        <p>Personal Purchases</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0"><b>690</b></h5>
                        <p class="no-margin">December</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col s7 m7">
                        <i class="fa fa-money-bill-wave fa-2x background-round mt-5 gradient-90deg-deep-orange-orange white-text"></i>
                        <p>Group Team Purchases</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0"><b>5,000</b></h5>
                        <p class="no-margin">December</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col s7 m7">
                        <i class="fa fa-users fa-2x background-round mt-5 gradient-90deg-deep-orange-orange white-text"></i>
                        <p>Current Members</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0"><b>20</b></h5>
                        <p class="no-margin">Total</p>
                        <!-- <p>1st-level</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Star Sponsorship Incentive | Personal Purchase Commission | Team Building Incentive | Leadership Star Bonus -->
<div class="row">
    <div class="col s12 m3 l3">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col l12 center">Star Sponsorship Incentive <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></div>
                </div>
                <div class="row">
                    <div class="col l12 center"><h5><b>650</b></h5></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col l12 center">Personal Purchase Commission <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></div>
                </div>
                <div class="row">
                    <div class="col l12 center"><h5><b>650</b></h5></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col l12 center">Team Building Incentive <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></div>
                </div>
                <div class="row">
                    <div class="col l12 center"><h5><b>650</b></h5></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col l12 center">Leadership Star Bonus <a class="tooltipped" data-position="right" data-tooltip="I am a tooltip"><i class="fa fa-question-circle fa-xs"></i></a></div>
                </div>
                <div class="row">
                    <div class="col l12 center"><h5><b>650</b></h5></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card-panel">
            <h6 class="header m-0">Purchases <a class="waves-effect waves-light btn right" href="{{ route('purchases.index') }}">Details</a></h6>
            <canvas id="personal_group_sales">Your browser does not support the canvas element.</canvas>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h6 class="header m-0">Recent Personal Purchases <a class="waves-effect waves-light btn right" href="{{ route('purchases.index') }}">See All</a></h6>
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
                                <th width="30">Transaction #</th>
                                <th width="20">Date</th>
                                <th width="10">Gross Amount</th>
                                <th width="10">Net Amount</th>
                                <th width="10">PCC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>2,000</td>
                            </tr>
                            <tr>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>2,000</td>
                            </tr>
                            <tr>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>2,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h6 class="header m-0">Recent Group Purchases <a class="waves-effect waves-light btn right" href="{{ route('purchases.index') }}">See All</a></h6>
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
                                <th width="30">Transaction #</th>
                                <th width="30">Member ID</th>
                                <th width="30">Name</th>
                                <th width="10">Rank</th>
                                <th width="10">Gross Amount</th>
                                <th width="10">Net Amount</th>
                                <th width="30">Seller ID</th>
                                <th width="20">Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123456789</td>
                                <td>123456789</td>
                                <td>John Doe</td>
                                <td><span class="new badge green lighten-2" data-badge-caption="star"> 3</span></td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                            </tr>
                            <tr>
                                <td>123456789</td>
                                <td>123456789</td>
                                <td>Austin Yu</td>
                                <td><span class="new badge orange lighten-2" data-badge-caption="star"> 4</span></td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                            </tr>
                            <tr>
                                <td>123456789</td>
                                <td>123456789</td>
                                <td>Mary Jane</td>
                                <td><span class="new badge purple lighten-2" data-badge-caption="star"> 5</span></td>
                                <td>25,000</td>
                                <td>18,750</td>
                                <td>123456789</td>
                                <td>10/12/2019</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card-panel">
            <h6 class="header m-0">Recent Member Registrations</h6>
            <ul class="collection mb-0">
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-7.png" alt="" class="circle">
                    <p class="font-weight-600">John Doe</p>
                    <p class="medium-small">18, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-3.png" alt="" class="circle">
                    <p class="font-weight-600">Adam Garza</p>
                    <p class="medium-small">20, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-5.png" alt="" class="circle">
                    <p class="font-weight-600">Jennifer Rice</p>
                    <p class="medium-small">25, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                </li>
            </ul>
            <div class="center mt-3">
                <a class="waves-effect waves-light btn">View All</a>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
$(function() {
    var pgs_chart = $('#personal_group_sales');

    $('#pgs_table').bootstrapTable();
    new Chart(pgs_chart, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Personal Purchases',
                    data: [12, 3, 5, 2, 3,12, 3, 5, 2, 3, 7,8],
                    borderColor: 'orange',
                    borderWidth: 3,
                    fill: false
                },
                {
                    label: 'Group Team Purchases',
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
});
</script>
@endsection