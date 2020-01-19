@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="container">
    <div class="row">
        <h5 class="white-text">Products </h5>
        <div class="col s12 m12 l12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb">Products</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div id="product_toolbar">
                <a class="waves-effect waves-light btn btn-small modal-trigger" href="#add_product"><i class="fa fa-plus"></i> Add New</a>
                @include('products.modals.product_form')
            </div>
            <div class="card-panel">
                <table id="product_table" 
                    class="table table-sm"
                    data-search="true"
                    data-show-search-button="true"
                    data-search-on-enter-key="true"
                    data-toolbar="#product_toolbar"
                    data-url="/cs/products"
                    data-side-pagination="server"
                    data-pagination="true"
                    data-page-size="10">
                    <thead>
                        <tr> 
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="image" data-formatter="productFormatter">Product</th>
                            <th data-field="category" data-sortable="true" data-formatter="categoryFormatter">Category</th>
                            <th data-field="cost" data-sortable="true">Cost</th>
                            <th class="th-inner" data-align="center" data-field="action" data-formatter="actionFormatter">Action(s)</th>
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
    $('#product_table').bootstrapTable({
        onLoadSuccess: function() {
            $('.materialboxed').materialbox();
        }
    });

    $('#add_product').modal({
        dismissible : false
    });
});

function productFormatter(value, row, index) {
    var image_src = "{!! url('storage/" + value + "') !!}";
    return '<img class="materialboxed" src="' + image_src + '" width="50">';
}

function categoryFormatter(value, row, index) {
    var badge;
    var badge_color;

    if (value == 1) 
    {
        badge = 'SpectraGlow';
        badge_color = 'pink';
    }
    else if (value == 2) 
    {
        badge = 'SpectraWhite';
        badge_color = 'orange';
    }

    return '<span class="new badge ' + badge_color + ' lighten-2" data-badge-caption="' + badge + '"></span>';
}

function actionFormatter(value, row, index) {
    return '<a class="edit_product mr-5" href="javascript:void(0)" title="Edit"><i class="fa fa-edit fa-lg"></i></a><a class="delete_product red-text" href="javascript:void(0)" title="Delete"><i class="fa fa-times fa-lg"></i></a>';
}
</script>
@endsection