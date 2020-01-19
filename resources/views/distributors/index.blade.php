@extends('layouts.app')
@section('title', 'Distributors')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Distributors </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Distributors</a>
        </div>
    </div>
</div>
<div class="container">
    @include('distributors.form')
    <div class="row">
        <div class="col s12">
            <div id="distributor_toolbar">
                <a class="waves-effect waves-light btn btn-small modal-trigger" href="#modal1"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="card-panel">
                <table id="distributor_table"
                    class="table highlight" 
                    data-toolbar="#distributor_toolbar"
                    data-search="true"
                    data-pagination="true">
                    <thead>
                        <tr> 
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="user_id" data-sortable="true">User ID</th>
                            <th data-field="role_id" data-sortable="true">Role ID</th>
                            <th data-field="is_active" data-sortable="true">Active</th>
                            <th data-field="created_at" data-sortable="true">Created At</th>
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
$(function() {
    var distributor_data = $.parseJSON('{!! $distributor !!}');

    console.log(distributor_data)
    $('#distributor_table').bootstrapTable({
        data : distributor_data,
    });

    $('.modal').modal();
});
</script>
@endsection