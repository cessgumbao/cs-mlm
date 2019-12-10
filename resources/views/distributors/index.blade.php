@extends('layouts.app')
@section('title', 'Distributors')
@section('content')
@can('browse_distributors')
<div class="container">
    <div class="row"> 
        <div class="valign-wrapper">
            <div class="col s9 m6 l6">
                <h4> <i class="fa fa-people-carry"></i> Distributors </h4>
            </div>
            <div class="col s3 m6 l6 right-align">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="fa fa-plus"></i></a>
            </div>
        </div>        
    </div>
    @include('distributors.form')
    <div class="row">
        <div class="col s12">
            <table id="distributor_table">
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
@else
    <div class="row"> <div class="col s12">{!! setting('site.401_error') !!}</div> </div>
@endcan
@endsection
@section('script')
<script>
$(function() {
    var distributor_data = $.parseJSON('{!! $distributor !!}');

    console.log(distributor_data)
    $('#distributor_table').bootstrapTable({
        data : distributor_data,
        classes : ['table', 'highlight'],
        search: true,
        pagination: true
    });

    $('.modal').modal();
});
</script>
@endsection