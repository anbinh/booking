@extends('layouts.default')
@section('content')
<link href="{{ cached_asset('css/jRating.jquery.css', true) }}" rel="stylesheet"/>
    <div class="main-body-container" style="padding-top: 80px;padding-bottom: 20px">
        <div class="row">
        </div>
        <div class="row" style="padding: 0 0 100px;background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
        </div>
    </div>

<script src="{{ cached_asset('/home_page/js/jquery.min.js', true) }}"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="{{ cached_asset('/home_page/js/imagesloaded.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/skrollr.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/_main.js', true) }}"></script>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="{{ cached_asset('js/jRating.jquery.min.js', true) }}"></script>
<script src="{{ cached_asset('js/jquery.raty.js', true) }}"></script>
<script type="text/javascript">
    $("#datepicker").datepicker();
    $(document).ready(function(){
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
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 0, 500 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $("input#from-price").val(ui.values[ 0 ])
                $("input#to-price").val(ui.values[ 1 ])
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });
</script>
@stop