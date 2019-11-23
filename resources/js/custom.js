$(document).ajaxStart(function() {
    $('.preloader-wrapper').addClass('active');
});

$(document).ajaxComplete(function() {
    $('.preloader-wrapper').removeClass('active');
});

$('body').on('keyup', "input[data-type='currency']", function() {
    formatCurrency($(this));
});

$('body').on('blur', "input[data-type='currency']", function() {
    formatCurrency($(this), "blur");
});

window.formatNumber = function(n) 
{
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

window.formatCurrency = function (input, blur) 
{
    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

window.detailLoader = function() 
{
    return '<div class="preloader-wrapper small">'+
                '<div class="spinner-layer spinner-blue-only">'+
                    '<div class="circle-clipper left">'+
                        '<div class="circle"></div>'+
                    '</div><div class="gap-patch">'+
                        '<div class="circle"></div>'+
                    '</div><div class="circle-clipper right">'+
                        '<div class="circle"></div>'+
                    '</div>'+
                '</div>'+
            '</div>';
}

window.currencyFormatter = function(value)
{
    return "<div class='right-align green-text text-darken-2'>" + numeral(value).format('0,0[.]00') + "</div>";
}