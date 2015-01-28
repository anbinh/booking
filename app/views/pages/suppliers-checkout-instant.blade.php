@extends('layouts.default')
@section('cssfile')
    <link href="{{ cached_asset('css/jRating.jquery.css', true) }}" rel="stylesheet"/>
    <link href="{{ cached_asset('/css/supplier.css', true) }}" rel="stylesheet"/>
    <link href="{{ cached_asset('/css/supplier-checkout.css', true) }}" rel="stylesheet"/>
@stop
@section('content')
    <div class="main-body-container" style="padding-top: 80px;padding-bottom: 20px">
        <div class="row progress-status-bar">
            <div class="col-md-12">
                <ol class="steps">
                    <li class="steps__item steps__item--active steps__item--first"><a href="#" class="steps__link">Select
                            a supplier</a></li>
                    <li class="steps__item steps__item--active steps__item--first" disabled="disabled"><a href="#"
                                                                                                          class="steps__link">Confirm
                            the booking</a>
                    </li>
                    <li class="steps__item steps__item--active steps__item--first" disabled="disabled"><a href="#"
                                                                                                          class="steps__link">Check
                            out</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row main-element-container">
            <div id="canvasloader-container" class="wrapper" style="position: absolute;top: 50%;left: 50%;"></div>
            <form method="post" action="{{route('payment-purchase')}}" class="payment-form">
            <div class="review-review col-md-12">
                    <div class="row">
                        <h3><b>The supplier you chose is Instant booking enabled!!!</b></h3>
                        <h3>This is your last step of the booking.</h3>
                        <h3 class="payment-header"><b>How would you like to pay?</b></h3>
                        <div class="col-md-12">
                            <div class="sample1">
                                <div class="radio radio-success">
                                    <label>
                                        <input class="paymentMethod" type="radio" name="payment" value="0" checked=""><span
                                                class="circle"></span>
                                        Credit card*
                                    </label>
                                </div>
                                <div class="radio radio-success">
                                    <label>
                                        <input class="paymentMethod" type="radio" name="payment" value="1"><span class="circle"></span>
                                        Cash on delivery
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="confirm-signin col-md-12">
                            <h3 style="text-decoration:underline">Card information</h3>
                            <div class="form-group">
                                <label for="bill_cc"
                                       class="col-sm-4 control-label text-aglign-left">Card number:</label>
                                <div class="col-sm-8">
                                    <input type="cvv2" class="form-control" name="bill_cc"
                                           required="required" id="bill_cc" placeholder="Card number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cvv2"
                                       class="col-sm-4 control-label text-aglign-left">CVV:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="cvv2"
                                           required="required" id="cvv2"
                                           placeholder="CVV">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="expmoth"
                                       class="col-sm-4 control-label text-aglign-left">Expired Time:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="cc_brand" name="expmoth">
                                        @for($i= 1; $i <= 12; $i++)
                                            <option name="expmoth" value="{{$i}}">
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    {{--<select class="form-control" id="cc_brand" name="expyear">--}}
{{--                                        @for($i = 2010; $i <= 2020; $i++)--}}
                                            {{--<option name="expyear" value="{{$i}}">--}}
                                                {{--{{$i}}--}}
                                            {{--</option>--}}
                                        {{--@endfor--}}
                                    {{--</select>--}}
                                    <input type="tel" class="form-control" name="expyear"
                                    required="required" id="expyear">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardholder_name" class="col-sm-4 control-label text-aglign-left">Card
                                    holder: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="cardholder_name" id="cardholder_name"
                                           required="required" placeholder="Your name in card">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cc_brand" class="col-sm-4 control-label text-aglign-left">Card brand</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="cc_brand" name="cc_brand">
                                        <option name="nation" value="AMEX">
                                            American Express
                                        </option>
                                        <option name="nation" value="CB">
                                            Carte Blanche
                                        </option>
                                        <option name="nation" value="DC">
                                            Diners Club
                                        </option>
                                        <option name="nation" value="DI">
                                            Discover
                                        </option>
                                        <option name="nation" value="FP">
                                            FirePay
                                        </option>
                                        <option name="nation" value="JC">
                                            JCB
                                        </option>
                                        <option name="nation" value="LA">
                                            Laser
                                        </option>
                                        <option name="nation" value="MC">
                                            MasterCard
                                        </option>
                                        <option name="nation" value="MD">
                                            Maestro
                                        </option>
                                        <option name="nation" value="N">
                                            Novus
                                        </option>
                                        <option name="nation" value="SO">
                                            Solo
                                        </option>
                                        <option name="nation" value="SW">
                                            Switch
                                        </option>
                                        <option name="nation" value="VD">
                                            Visa Delta
                                        </option>
                                        <option name="nation" value="VE">
                                            Visa Electron
                                        </option>
                                        <option name="nation" value="VC">
                                            Visa
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{number_format($task->cost, 2)}}" name="bill_amount">
                        <input type="hidden" value="{{$task->id}}" name="track_id">
                        <input type="hidden" value="USD" name="currencycode">
                    </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-4 text-center finished-bottom">
                    <button id="finised-button" type="submit" style="width: 80%" class="btn btn-default btn-primary">Finished
                        <div class="ripple-wrapper"></div>
                    </button>
                </div>
            </div>
            </form>
            <footer class="footer-note">
                <small>*5% credit card charge will apply (the evil bank wants it!)</small>
                <h1></h1>
            </footer>
        </div>
    </div>
    </div>
    </div>
@stop

@section('jsfile')
    <script> var NEXT_PAGE = "{{route('suppliers-done', ['id_code' => $task->id])}}"; </script>
    <script> var PAYMENT_PAGE = "{{route('payment-purchase')}}"; </script>
    <script src="http://heartcode-canvasloader.googlecode.com/files/heartcode-canvasloader-min-0.9.1.js"></script>
    <script src="{{ cached_asset('/js/payment.js', true)}}"></script>
@stop