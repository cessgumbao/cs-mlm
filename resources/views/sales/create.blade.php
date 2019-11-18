@extends('layouts.app')
@section('title', 'Sales')
@section('content')
@can('browse_sales')
<div class="container">
    <div class="row">
        <div class="col s12">
            <a class="breadcrumb" href="{{ url('/home')}}">Dashboard</a>
            <a class="breadcrumb" href="{{ url('/sales')}}">Sales</a>
            <a class="breadcrumb">Create</a>
        </div>
    </div>
    <form id="sale_form" method="POST" action="{{ route('sales.store') }}">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            <ul class="stepper linear">
                <li class="step active">
                    <div class="step-title waves-effect">Enter Member ID</div>
                    <div class="step-content">
                        <div class="row">
                            <div class="col s11 m11 l11">
                                <div class="input-field">
                                    <input class="validate" type="text" id="member_id" name="member_id" required>
                                    <label for="member_id">Member ID</label>
                                </div>
                            </div>
                            <div class="col s1 m1 l1">
                                <a class="modal-trigger" href="#search_member_modal"><i class="fa fa-search teal-text"></i></a>
                                @include('sales.modals.search_member')
                            </div>

                        </div>
                        <div class="step-actions">
                            <button class="waves-effect waves-dark btn next-step" data-feedback="checkMemberID">Next</button>
                        </div>
                    </div>
                </li>
                <li class="step">
                    <div class="step-title waves-effect">Choose Products</div>
                    <div class="step-content">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="card-panel blue lighten-5">  
                                        <span class="grey-text"><i class="fa fa-info-circle"></i> First time buyers must have a minimum purchase of two sets of Spectra products to become a 3-star member.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m5 l5">
                                    <div class="input-field">
                                        <select name="product_category" id="product_category" placeholder="Product Categories">
                                            <option value=""></option>
                                            @foreach($categories as $product_category)
                                                <option value="{{ $product_category->id }}"> {{ $product_category->category_name }} </option>
                                            @endforeach
                                        </select>
                                        <label for="product_category" class="center-align">Select a Category</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="card-panel products">
                                        <ul class="collection list-inline">
                                            <!-- list here -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row product_summary">                                          
                                <div class="col s12 m9 l9">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <i class="fa fa-shopping-cart"></i> Cart
                                            <div class="card-panel selected_products_container">
                                                <table id="product_cart">
                                                    <thead>
                                                        <tr> 
                                                            <!-- <th data-field="id" data-visible="false">ID</th> -->
                                                            <th data-field="image" width="20"></th>
                                                            <th data-field="product_name">Product Name</th>
                                                            <th data-field="product_cost">Product Cost</th>
                                                            <th data-field="product_quantity" width="15">Quantity</th>
                                                            <th data-field="actions" width="15"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m3 l3">
                                    <div class="container">
                                        <div class="row right-align"> 
                                            <i class="fa fa-money-bill"></i> Total Amount: <strong><p id="total_amount">#</p></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-actions">
                            <button class="waves-effect waves-dark btn previous-step">Back</button>
                            <button class="waves-effect waves-dark btn next-step" data-feedback="checkProductQuantity">Next</button>
                        </div>
                    </div>
                </li>
                <li class="step">
                    <div class="step-title waves-effect">Order Summary</div>
                    <div class="step-content">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <i class="fa fa-address-card"></i> Member's Information
                                    <div class="card">
                                        <div class="card-panel">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <strong><div> ID <span class="right" id="summary_member_id"></span> </div></strong>
                                                    <strong><div> Name <span class="right" id="summary_name"></span> </div></strong>
                                                    <strong><div> City <span class="right" id="summary_city"></span> </div></strong>
                                                    <strong><div> Region <span class="right" id="summary_region"></span> </div></strong>
                                                    <strong><div> Rank <span class="right" id="summary_rank"></span> </div></strong>
                                                    <div class="divider"></div>
                                                    <strong><div class="blue-text"> Wallet <span class="right" id="summary_wallet"></span> </div></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">              
                                    <i class="fa fa-file-invoice-dollar"></i> Summary                
                                    <div class="card">
                                        <div class="card-panel">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div> Total Amount <span class="right" id="summary_total"></span><input type="hidden" name="total_amount"></div>
                                                    <div> Discount<span class="right" id="summary_discount"></span><input type="hidden" name="discount"></div>
                                                    <div class="divider"></div>
                                                    <strong><div> Net Amount<span class="right" id="summary_net"></span><input type="hidden" name="net_amount"></div></strong> 
                                                    <div class="green-text"> Overriding Commission <span class="right" id="summary_oc"></span><input type="hidden" name="overriding_commission"></div> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field">
                                                        <select name="mode_of_payment" id="mode_of_payment">
                                                            <option value="" disabled selected>Select mode of payment</option>
                                                            @foreach($mode_of_payments as $mode_of_payment)
                                                                <option value="{{ $mode_of_payment->id }}"> {{ $mode_of_payment->mode }} </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="mode_of_payment" class="center-align">Mode of payment</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">account_balance_wallet</i>
                                                        <input type="text" class="right-align" name="ecash_used" id="ecash_used" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" autocomplete="off" data-type="currency" value="0">
                                                        <label for="ecash_used">Use cash in wallet</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">payment</i>
                                                        <input type="text" class="right-align" name="payment" id="payment" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" autocomplete="off" data-type="currency" value="0">
                                                        <label for="payment">Payment (Physical)</label>
                                                    </div>  
                                                    <div class="input-field">
                                                        <i class="fa fa-calculator prefix"></i>
                                                        <input type="text" class="right-align" name="total_payment" id="total_payment" value="0" disabled>
                                                        <label for="total_payment">Total Payment</label>
                                                    </div>  
                                                    <div class="input-field">
                                                        <i class="fa fa-coins prefix"></i>
                                                        <input type="text" class="right-align" name="payment_change" id="payment_change" value="0" readonly>
                                                        <label for="payment_change">Change</label>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-actions">
                            <button class="waves-effect waves-dark btn previous-step">Back</button>
                            <button class="waves-effect waves-dark btn" onclick="completeSale();">Complete</button>
                            <!-- <input type="button" class="complete_sale waves-effect waves-dark btn" onclick="completeSale();" value="Complete"> -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> 
    </form>
</div>
@else
    <div class="row"> <div class="col s12">{!! setting('site.401_error') !!}</div> </div>
@endcan
@endsection
@section('style')
<style>
    #search_member_table tbody > tr:hover {
        cursor: pointer;
    }

    .products {
        display: none;
        max-height: 300px;
        overflow-y: auto;
    }

    .product_summary { 
        display: none;
    }

    .selected_products_container {
        max-height: 300px;
        overflow-y: auto;
    }

</style>
@endsection
@section('script')
<script>
$(function() {
    
    member_profile = [];

    // Stepper
    stepper = document.querySelector('.stepper');
    stepperInstace = new MStepper(stepper, {
        firstActive: 0,
        linearStepsNavigation: true,
        autoFocusInput: false,
        showFeedbackPreloader: false,
        autoFormCreation: false,
        stepTitleNavigation: false,
    });

    $('#search_member_modal').modal({
        dismissible : false
    });

    $('#product_category').formSelect({ dropdownOptions : "{{ App\ProductCategory::all() }}" })

    // Search Member Table 
    var search_member_table = $('#search_member_table');
    
    search_member_table.bootstrapTable({
        data : [],
        classes : ['table', 'highlight', 'centered'],
        search: true,
        pagination: true,
        clickToSelect: true,
        singleSelect: true
    });

    // Search member in modal
    search_member_table.on('search.bs.table', function(e) {
        if ($.trim($('.search-input').val()))
        {
            $.post('/members/search', { search : $('.search-input').val(), _token : '{{ csrf_token() }}' }, function(response) {
                search_member_table.bootstrapTable('load', response);
            });
        }
    });

    // Select a member
    $('body').on('click', '.select_member', function() {
        var selected = search_member_table.bootstrapTable('getSelections')[0];
        $('#member_id').val(selected.member_id);
        $('label[for=member_id]').addClass('active');
    });

    // Select a product category
    $('body').on('change', '#product_category', function() {
        var selected = $(this).val();

        if($.trim(selected))
        {
            $('.products').css('display', 'block');
            
            $.get('/product_categories/get-products/' + selected, function(response) 
            {
                var list = '';

                $.each($.parseJSON(response), function(i, val) 
                {
                    var image_src = "{!! url('storage/" + val.image + "') !!}";
                    
                    list += '<li class="collection-item avatar"><img src="' + image_src + '" class="circle" alt=""><b><span class="title">'+ val.name +'</span></b><p>' + numeral(val.cost).format('0,0[.]00') + '</p><a href="#!" class="" title="Add to Cart" onClick="addToCart('+ val.id +', \'' + val.name + '\', ' + val.cost + ', \'' + escape(val.image) +'\', ' + val.is_set + ');"><i class="fa fa-cart-plus"></i> Add to cart</a></li>';
                });

                $('.products .collection').html(list);
            });
        }
    });

    // Quantity change
    $('body').on('change', '.product_count', function() {
        var total_amount = computeCartTotalAmount();
        $('#total_amount').html(numeral(total_amount).format('0,0[.]00'));
        $('input[name=total_amount]').val(total_amount);
        $('#summary_total').html('Php ' + numeral(total_amount).format('0,0[.]00'));
    });

    // Remove product from cart
    $('body').on('click', '.remove_product_cart', function(e) {
        e.preventDefault();
        $(this).parents('tr').remove();
        var total_amount = computeCartTotalAmount()
        $('#total_amount').html(numeral(total_amount).format('0,0[.]00'));
        $('input[name=total_amount]').val(total_amount);
        $('#summary_total').html('Php ' + numeral(total_amount).format('0,0[.]00'));
    });

    // Compute change when adding payment
    $('body').on('keyup', '#payment, #ecash_used', function() {
        var net_amount = parseFloat($('#summary_net').text().replace(',',''));
        var payment = $.trim($('#payment').val()) == '' ? 0 : parseFloat($('#payment').val().replace(',',''));
        var ecash_used = $.trim($('#ecash_used').val()) == '' ? 0 : parseFloat($('#ecash_used').val().replace(',',''));
        var total_payment = parseFloat(payment + ecash_used);
        var change = total_payment - net_amount;

        $('label[for=payment_change]').addClass('active');
        $('label[for=total_payment]').addClass('active');

        $('#total_payment').val(numeral(total_payment).format('0,0[.]00'));
        $('#payment_change').val(numeral(change).format('0,0[.]00'));
    });
});

function checkMemberID(destroyFeedback, form, activeStepContent)
{
    var member_input = $('#member_id').val();

    $.post('/members/check/', { member_id : member_input, _token : '{{ csrf_token() }}'}, function(response) {
        if (response.success) 
        {
            member_profile = response.member_profile;
            
            $('#summary_member_id').html(member_profile.member_id);
            $('#summary_name').html(member_profile.member_name);
            $('#summary_city').html(member_profile.city);
            $('#summary_region').html(member_profile.region);
            $('#summary_rank').html(member_profile.rank ? member_profile.rank : 'First Timer');
            $('#summary_wallet').html(member_profile.ecash ? member_profile.ecash : '-');

            // if (!member_profile.ecash) $('#ecash_used').attr('disabled', 'disabled');
            stepperInstace.nextStep();
            destroyFeedback(true);
        }
        else
        {
            M.toast({html: '<i class="fa fa-exclamation-circle"></i> ' + response.error, classes: 'toast-warning'});
            stepperInstace.wrongStep();
            destroyFeedback(false);
        }
    });
}

function checkProductQuantity(destroyFeedback, form, activeStepContent)
{
    var quantity_exist = $('.product_count').length;

    if (quantity_exist)     
    {
        $.post('/sales/generate-computation', 
        { 
            member_profile : member_profile,
            products : getSelectedProducts(),
            total_amount : computeCartTotalAmount(),
            _token : '{{ csrf_token() }}',
        }, function(response) 
        {
            $('input[name=total_amount]').val(response.total_amount);
            $('input[name=discount]').val(response.discount);
            $('input[name=net_amount]').val(response.net_amount);
            $('input[name=overriding_commission]').val(response.overriding_commission);

            $('#summary_total').text(numeral(response.total_amount).format('0,0[.]00'));
            $('#summary_discount').text(numeral(response.discount).format('0,0[.]00'));
            $('#summary_net').text(numeral(response.net_amount).format('0,0[.]00'));
            $('#summary_oc').text(numeral(response.overriding_commission).format('0,0[.]00'));

            $('#ecash_used').val('0');
            $('#payment').val('0');
            $('#payment_change').val('0');
            
            stepperInstace.nextStep();
            destroyFeedback(true);
        });
    }
    else
    {
        M.toast({html: '<i class="fa fa-exclamation-circle"></i> Please choose products first', classes: 'toast-warning'});
        stepperInstace.wrongStep();
        destroyFeedback(false);
    }
}

function addToCart(id, name, cost, image, is_set)
{
    var image_src = "{!! url('storage/" + image + "') !!}";
    $('.product_summary').css('display', 'block');
    $('#product_cart tbody').append('<tr class="product_' + id + '"><input type="hidden" name="product_id[]" value="' + id + '"><td><img alt="" src="' + image_src + '" width="75" height="75"></td><td class="product_name"><input type="hidden" name="product_name[]" value="' + name + '">' + name + '</td><td class="product_cost"><input type="hidden" name="product_cost[]" value="' + cost +'">' + numeral(cost).format('0,0[.]00') + '</td><td><div class="input-field"><input type="number" name="product_count[]" class="product_count validate" oninput="validity.valid||(value=\'\');" min="1" required></div></td><td><a href="#" class="remove_product_cart"><i class="fa fa-times"></i></a></td><input type="hidden" class="is_set" name="product_is_set[]" value="' + is_set + '"></tr>');
}

function computeCartTotalAmount()
{
    var total_amount = 0;
    $('#product_cart > tbody > tr').each(function() {
        var this_quantity = $(this).find('.product_count').val() ? parseFloat($(this).find('.product_count').val()) : 0;
        var this_cost = parseFloat($(this).find('.product_cost').text());
        total_amount += (this_quantity*this_cost);
    });
    return total_amount;
}

function getSelectedProducts()
{
    var product_arr = [];

    $('#product_cart tbody > tr').each(function(i, val) {
        var row_class = $(this).attr('class').split('_');
        var product_id = row_class[1];
        
        product_arr.push({
            id : parseInt(product_id),
            name: $(this).find('.product_name').text(),
            cost: parseFloat($(this).find('.product_cost').text()),
            quantity: parseInt($(this).find('.product_count').val()),
            is_set: parseInt($(this).find('.is_set').val()),
        });
    });

    return product_arr;
}

function completeSale()
{
    event.preventDefault();
    var sale_form = $('#sale_form');
    var form_data = sale_form.serializeArray();
    var sales_data = {};

    $.each(form_data, function() 
    {
        sales_data[this.name] = this.value;
    });

    $.post('/sales/validate', sales_data, function(response) 
    {
        if (response.success) 
        {
            sale_form.submit();
        }
        else 
        {
            M.toast({html: '<i class="fa fa-exclamation-circle"></i> ' + response.error, classes: 'toast-error'});
        }
    });
}

</script>
@endsection