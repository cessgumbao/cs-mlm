<div class="row">
    <div class="col s12 m4 l4">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col s7 m7">
                        <i class="fa-2x material-icons background-round mt-5 gradient-90deg-deep-orange-orange white-text">timeline</i>
                        <p>Monthly Sales</p>
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
                        <i class="fa-2x material-icons background-round mt-5 gradient-90deg-deep-orange-orange white-text">person_outline</i>
                        <p>Members</p>
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
    <div class="col s12 m4 l4">
        <div class="card gradient-shadow min-height-100">
            <div class="padding-4">
                <div class="row">
                    <div class="col s7 m7">
                        <i class="fa fa-hand-holding-usd fa-2x background-round mt-5 gradient-90deg-deep-orange-orange white-text"></i>
                        <p>Payouts</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0"><b>5,000</b></h5>
                        <p class="no-margin">Total</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l8">
        <div class="card-panel">
            <h6 class="header m-0">Sales <a class="waves-effect waves-light btn right">Details</a></h6>
            <canvas id="sales_chart">Your browser does not support the canvas element.</canvas>
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

@if (Auth::user()->hasRole(['city_distributor', 'regional_distributor']))
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h6 class="header m-0">Personal Purchases <a class="waves-effect waves-light btn right">See All</a></h6>
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
            <h6 class="header m-0">Group Purchases <a class="waves-effect waves-light btn right">See All</a></h6>
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
                                <th width="10">Gross Amount</th>
                                <th width="10">Net Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Makati City</td>
                                <td><span class="new badge green lighten-2" data-badge-caption="star"> 3</span></td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                            </tr>
                            <tr>
                                <td>Austin Yu</td>
                                <td>Pasay City</td>
                                <td><span class="new badge orange lighten-2" data-badge-caption="star"> 4</span></td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                            </tr>
                            <tr>
                                <td>Mary Jane</td>
                                <td>Taguig City</td>
                                <td><span class="new badge purple lighten-2" data-badge-caption="star"> 5</span></td>
                                <td>10/12/2019</td>
                                <td>25,000</td>
                                <td>18,750</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endif 

<div class="row">
    <div class="col s12 m6 l6">
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
            <div class="center mt-5">
                <a class="waves-effect waves-light btn">View All</a>
            </div>
        </div>
    </div>

    <!-- For admin/owner only -->
    @if (Auth::user()->hasRole(['admin', 'owner']))
    <div class="col s12 m6 l6">
        <div class="card-panel">
            <h6 class="header m-0">Recent Promotions</h6>
            <ul class="collection mb-0">
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-7.png" alt="" class="circle">
                    <p class="font-weight-600">John Doe</p>
                    <p class="medium-small">3-star <i class="material-icons tiny">arrow_forward</i> 4-star</p>
                    <p class="medium-small grey-text">18, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-3.png" alt="" class="circle">
                    <p class="font-weight-600">Adam Garza</p>
                    <p class="medium-small">3-star <i class="material-icons tiny">arrow_forward</i> 4-star</p>
                    <p class="medium-small grey-text">20, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="../../../app-assets/images/avatar/avatar-5.png" alt="" class="circle">
                    <p class="font-weight-600">Jennifer Rice</p>
                    <p class="medium-small">3-star <i class="material-icons tiny">arrow_forward</i> 4-star</p>
                    <p class="medium-small grey-text">25, January 2019</p>
                    <a href="#!" class="secondary-content"><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i></a>
                </li>
            </ul>
            <div class="center mt-5">
                <a class="waves-effect waves-light btn">View All</a>
            </div>
        </div>
    </div>
    @endif
    <!-- For admin/owner only -->
</div>
@section('script')
<script>
$(function() {
    var pgs_chart = $('#sales_chart');
    var members_chart = $('#members');

    $('#pgs_table').bootstrapTable();
    new Chart(pgs_chart, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Monthly Sales',
                    data: [12, 3, 5, 2, 3,12, 3, 5, 2, 3, 7,8],
                    borderColor: 'orange',
                    borderWidth: 3,
                    fill: false
                },
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
                    backgroundColor: [ '#5aa73a', '#ff9d23', '#f48fb1']
                },
            ]
        },
        options: { },
    });
});
</script>
@endsection