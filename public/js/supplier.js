/**
 * Created by thinhvoxuan on 1/24/15.
 */
$("#datepicker").datepicker();
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
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [0, 500],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $("input#from-price").val(ui.values[0])
            $("input#to-price").val(ui.values[1])
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
    " - $" + $("#slider-range").slider("values", 1));
});
