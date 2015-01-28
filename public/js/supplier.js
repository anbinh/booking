/**
 * Created by thinhvoxuan on 1/24/15.
 */

$("#datepicker").datepicker({
    onSelect: function(dateText, inst) {
        $('#booking-form').submit();
    }
});
$("input#timepicker").clockpicker({
    autoclose: true,
    afterDone: function() {
        $('#booking-form').submit();
    }
});
//$("#datepicker").attr("placeholder", " ");

$(document).ready(function () {
    // simple jRating call
    $(".basic").jRating({
        bigStarsPath: '/css/icons/stars.png',
        smallStarsPath: '/css/icons/small.png',
        length: 5,
        isDisabled: true
    });
//        $("div.filter-result-star").raty({
//            number: function() {
//                return $(this).attr('data-id');
//            },
//            score :function(){
//                return $(this).attr('data-id');
//            },
//            readOnly: true
//        });
    var fromPrice = $("input#from-price").val();
    var toPrice = $("input#to-price").val();
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 10,
        values: [fromPrice, toPrice],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $("input#from-price").val(ui.values[0])
            $("input#to-price").val(ui.values[1])
        },
        change: function( event, ui ) {
            $('#filter-result-form').submit();
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
    " - $" + $("#slider-range").slider("values", 1));

    $('button.button-instant-enabled').popover({ trigger: "hover" });

//    $('form').areYouSure( {'silent':true} );
//
//
//
//    $('form').on('dirty.areYouSure', function() {
//        // Enable save button only as the form is dirty.
//        $(this).submit();
//    });
//
//    $('#datepicker').on('change',function(){
//        $('#booking-form').submit();
//    });
    $('#service').change(function(){
        $('#booking-form').submit();
//        console.log('submit');
    });
    $('#long_service').change(function(){
        $('#booking-form').submit();
    });

    $('.start_filter').change(function(){
        $('#filter-result-form').submit();
    });
    $('#from-price').change(function(){
        $('#filter-result-form').submit();
    });
//    $('#amount').change(function(){
//        $('#filter-result-form').submit();
//    })

});




