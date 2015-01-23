@extends('layouts.default')
@section('content')
<link href="{{ cached_asset('css/jRating.jquery.css', true) }}" rel="stylesheet"/>
<style>
    /*html {*/
        /*-moz-box-sizing: border-box;*/
        /*box-sizing: border-box;*/
    /*}*/

    /**, :after, :before {*/
        /*-moz-box-sizing: inherit;*/
        /*box-sizing: inherit;*/
    /*}*/

    /*body {*/
        /*padding: 1em;*/
    /*}*/

    /**
     * Ordered list wrapper
     * 1. Prevents ugly shapes when selecting .steps
     * 2. Initializing counter
     */
    /*ol*/
    .steps {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        /* 1 */
        counter-reset: steps;
        /* 2 */
        overflow: hidden;
        list-style: none;
        padding: 0;
        margin: 0 0 1em 0;
    }

    /**
     * Steps
     * 1. Incrementing counter
     */
    /*li*/
    .steps__item {
        counter-increment: steps;
        /* 1 */
        background: #EFEFEF;
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        float: left;
        position: relative;
        white-space: nowrap;
        /**
         * Defining step width depending on the number of steps
         */
        /**
         * Arrow shapes
         */
        /**
         * Small width stuff kids
         */
    }
    .steps__item:first-child:nth-last-child(1), .steps__item:first-child:nth-last-child(1) ~ .steps__item {
        width: 100%;
    }
    .steps__item:first-child:nth-last-child(2), .steps__item:first-child:nth-last-child(2) ~ .steps__item {
        width: 50%;
    }
    .steps__item:first-child:nth-last-child(3), .steps__item:first-child:nth-last-child(3) ~ .steps__item {
        width: 33.33333%;
    }
    .steps__item:first-child:nth-last-child(4), .steps__item:first-child:nth-last-child(4) ~ .steps__item {
        width: 25%;
    }
    .steps__item:first-child:nth-last-child(5), .steps__item:first-child:nth-last-child(5) ~ .steps__item {
        width: 20%;
    }
    .steps__item:first-child:nth-last-child(6), .steps__item:first-child:nth-last-child(6) ~ .steps__item {
        width: 16.66667%;
    }
    .steps__item:first-child:nth-last-child(7), .steps__item:first-child:nth-last-child(7) ~ .steps__item {
        width: 14.28571%;
    }
    .steps__item:first-child:nth-last-child(8), .steps__item:first-child:nth-last-child(8) ~ .steps__item {
        width: 12.5%;
    }
    .steps__item:first-child:nth-last-child(9), .steps__item:first-child:nth-last-child(9) ~ .steps__item {
        width: 11.11111%;
    }
    .steps__item:first-child:nth-last-child(10), .steps__item:first-child:nth-last-child(10) ~ .steps__item {
        width: 10%;
    }
    .steps__item:after {
        width: 1.85616em;
        height: 1.85616em;
        position: absolute;
        top: 0.35355em;
        left: 100%;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        content: '';
        z-index: 2;
        background: inherit;
        border-right: 1px solid #ccc;
        border-top: 1px solid #ccc;
        margin-left: -0.92808em;
    }
    .steps__item[disabled] {
        cursor: not-allowed;
    }
    @media (max-width: 767px) {
        .steps__item {
            width: 100% !important;
            border: 1px solid #ccc;
            border-bottom: none;
            padding: 1em 0;
        }
        .steps__item:after {
            content: none;
        }
    }

    /**
     * Left border on first item
     */
    .steps__item--first {
        border-left: 1px solid #ccc;
    }

    /**
     * Right border on last item
     */
    .steps__item--last {
        border-right: 1px solid #ccc;
        /**
         * No left arrow on first item
         * No right arrow on last item
         */
    }
    @media (max-width: 767px) {
        .steps__item--last {
            border-bottom: 1px solid #ccc;
        }
    }
    .steps__item--last:after {
        content: none;
    }

    /**
     * Step link
     */
    /*a|span*/
    .steps__link {
        -webkit-transition: .25s ease-out;
        transition: .25s ease-out;
        color: #999;
        display: block;
        text-align: center;
        text-decoration: none;
        padding: 0.5em 0;
        /**
         * Counter
         */
        /**
         * Hover stuff
         */
    }
    .steps__link:before {
        width: 1.5em;
        height: 1.5em;
        display: inline-block;
        content: counter(steps);
        text-align: center;
        background: #BCBCBC;
        border-radius: 50%;
        color: white;
        margin: 0 1em;
        line-height: 1.5em;
    }
    :not([disabled]) > .steps__link:hover, :not([disabled]) > .steps__link:focus {
        color: #333;
    }
    @media (max-width: 767px) {
        .steps__link:before {
            float: left;
            margin-right: 0;
        }
    }

    /**
     * Active state
     */
    /*a*/
    .steps__item--active {
        background: #FFF;
    }

    /**
     * Change link colors
     */
    .steps__item--done .steps__link,
    .steps__item--active .steps__link {
        color: #333;
    }
    .steps__item--done .steps__link:before,
    .steps__item--active .steps__link:before {
        background: #22a4bc;
    }

    /**
     * Fallback for IE 8
     * Require Modernizr
     */
    /*html*/
    .no-csstransforms {
        /*li*/
    }
    .no-csstransforms .steps__item {
        border-right: 1px solid #ccc;
    }
    .no-csstransforms .steps__item:after {
        content: none !important;
    }

    /**
     * Fallback for IE 7
     * Require Modernizr
     */
    /*html*/
    .no-generatedcontent .steps {
        list-style-position: inside;
        list-style-type: decimal;
    }
    .no-generatedcontent .steps__link:before {
        content: none;
    }


    #filter-result-form td{
        padding-right: 20px;
    }

    #result-supplier div.row{
        padding-top: 20px;
        border: 1px solid;
        margin-top: 20px;
    }

    #result-supplier div.row:first-child{
        margin-top: 0px;
    }


</style>
    <div class="main-body-container" style="padding-top: 80px;padding-bottom: 20px">
        <div class="row">
            <div class="col-md-12">
                <ol class="steps">
                    <li class="steps__item steps__item--active steps__item--first"><a href="#" class="steps__link">Select a supplier</a></li>
                    <li class="steps__item" disabled="disabled"><a href="#" class="steps__link">Confirm the booking</a></li>
                    <li class="steps__item steps__item--last" disabled="disabled"><a href="#" class="steps__link">Pay</a></li>
                </ol>
            </div>
        </div>
        <div class="row" style="padding: 0 0 100px;background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
            <div class="col-md-4" style="padding-left: 30px">
                <div class="row" >
                    <div class="col-md-12" style="border: 1px solid;">
                        <h3>Modify your search</h3>
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="service" class="col-lg-2 control-label">Service</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="service">
                                            <option value="-1" selected>Select an Option</option>
                                            <option value="cleaning_homie">Cleaning Homie</option>
                                            <option value="handy_homie">Handy Homie</option>
                                            <option value="gardening homie">Gardening Homie</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datepicker" class="col-lg-2 control-label">Date</label>
                                    <div class="col-lg-10">
                                        <input id="datepicker" type="text" placeholder="mm/dd/yyyy" style="-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
												-webkit-padding-end: 20px;
												-webkit-padding-start: 2px;
												background-position: 97% center;
												background-repeat: no-repeat;
												border: 1px solid #AAA;
												font-size: inherit;
												overflow: hidden;
												padding: 5px 5px;
												text-overflow: ellipsis;
												white-space: nowrap;
												width: 65%;
												line-height: 25px;
												color: #fff;
												background-image: url(http://i62.tinypic.com/15xvbd5.png),-webkit-linear-gradient(#2ECC71, #289E5A 40%, #2ECC71);
												background-color: #2ECC71;
												border-radius: 20px;
												padding-left: 15px;" name="date"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="long_service" class="col-lg-2 control-label">Number of hours</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="long_service">
                                            <option value="-1" selected>Select an Option</option>
                                            <option value="1">1 hours</option>
                                            <option value="2">2 hours</option>
                                            <option value="3">3 hours</option>
                                            <option value="4">4 hours</option>
                                            <option value="5">5 hours</option>
                                            <option value="6">6 hours</option>
                                            <option value="7">7 hours</option>
                                            <option value="8">8 hours</option>
                                            <option value="9">9 hours</option>
                                            <option value="10">10 hours</option>
                                            <option value="longer">longer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Modify search</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form><h3>Modify your search</h3>
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="service" class="col-lg-2 control-label">Service</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="service">
                                            <option value="-1" selected>Select an Option</option>
                                            <option value="cleaning_homie">Cleaning Homie</option>
                                            <option value="handy_homie">Handy Homie</option>
                                            <option value="gardening homie">Gardening Homie</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datepicker" class="col-lg-2 control-label">Date</label>
                                    <div class="col-lg-10">
                                        <input id="datepicker" type="text" placeholder="mm/dd/yyyy" style="-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
												-webkit-padding-end: 20px;
												-webkit-padding-start: 2px;
												background-position: 97% center;
												background-repeat: no-repeat;
												border: 1px solid #AAA;
												font-size: inherit;
												overflow: hidden;
												padding: 5px 5px;
												text-overflow: ellipsis;
												white-space: nowrap;
												width: 65%;
												line-height: 25px;
												color: #fff;
												background-image: url(http://i62.tinypic.com/15xvbd5.png),-webkit-linear-gradient(#2ECC71, #289E5A 40%, #2ECC71);
												background-color: #2ECC71;
												border-radius: 20px;
												padding-left: 15px;" name="date"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="long_service" class="col-lg-2 control-label">Number of hours</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="long_service">
                                            <option value="-1" selected>Select an Option</option>
                                            <option value="1">1 hours</option>
                                            <option value="2">2 hours</option>
                                            <option value="3">3 hours</option>
                                            <option value="4">4 hours</option>
                                            <option value="5">5 hours</option>
                                            <option value="6">6 hours</option>
                                            <option value="7">7 hours</option>
                                            <option value="8">8 hours</option>
                                            <option value="9">9 hours</option>
                                            <option value="10">10 hours</option>
                                            <option value="longer">longer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Modify search</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12" style="border: 1px solid;">
                        <h3>Filter search results</h3>
                        <form class="form-horizontal" id="filter-result-form">
                            <fieldset>
                                <div class="form-group">
                                    <label for="service" class="col-lg-2 control-label">By ranking: </label>
                                    <div class="col-lg-10">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="4" data-id="1"></div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="filter-star" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"></div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="filter-star" value="2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="12" data-id="3"></div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="filter-star" value="3">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average=16 data-id="4"></div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="filter-star" value="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="20" data-id="5"></div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="filter-star" value="5">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <p>
                                            <label for="amount">Price range:</label>
                                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        </p>
                                        <div id="slider-range"></div>
                                        <input type="hidden" id="from-price" name="from-price" value="0">
                                        <input type="hidden" id="to-price" name="to-price" value="500">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Filter result</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 style="padding-top: 20px">We found these suppliers who meet your requirement</h2>
                <div class="container-fluid" id="result-supplier">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/140%x100" alt="140%x100" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDEzNCAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQxLjA0Njg3NSIgeT0iOTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xMzR4MTgwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true" style="height: 100px; width: 140px; display: block;">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h3>name of supplier</h3>
                        </div>
                        <div class="col-md-3">
                            <div class="basic" data-average="12" data-id="1"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-info center">USD 200</div>
                            <button class="btn btn-primary btn-sm">Book Now</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/140%x100" alt="140%x100" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDEzNCAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQxLjA0Njg3NSIgeT0iOTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xMzR4MTgwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true" style="height: 100px; width: 140px; display: block;">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h3>name of supplier</h3>
                        </div>
                        <div class="col-md-3">
                            <div class="basic" data-average="12" data-id="1"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-info center">USD 200</div>
                            <button class="btn btn-primary btn-sm">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ cached_asset('home_page/js/jquery.min.js', true) }}"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="{{ cached_asset('home_page/js/imagesloaded.js', true) }}"></script>
<script src="{{ cached_asset('home_page/js/skrollr.js', true) }}"></script>
<script src="{{ cached_asset('home_page/js/_main.js', true) }}"></script>

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
            isDisabled: false
        });
        $("div.filter-result-star").raty({
            number: function() {
                return $(this).attr('data-id');
            },
            score :function(){
                return $(this).attr('data-id');
            },
            readOnly: true
        });
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