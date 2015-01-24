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
                                                                                                          class="steps__link">Check out</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row main-element-container">
            <div class="review-review col-md-12">
                <div class="row">
                    <h3><b>The supplier you chose is Instant booking enabled!!!</b></h3>
                    <h3>This is your last step of the booking.</h3>
                    <h3 class="payment-header"><b>How would you like to pay?</b></h3>
                    <div class="col-md-12">
                        <div class="sample1">
                            <div class="radio radio-success">
                                <label>
                                    <input type="radio" name="sample1" value="option1" checked=""><span class="circle"></span><span class="check"></span>
                                    Credit card*
                                </label>
                            </div>
                            <div class="radio radio-success">
                                <label>
                                    <input type="radio" name="sample1" value="option1"><span class="circle"></span><span class="check"></span>
                                    Cash on delivery
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center finished-bottom">
                        <button type="submit"
                                class="btn btn-default btn-primary" style="width: 80%">
                            Finish
                        </button>
                    </div>
                    <footer class="footer-note">
                        <small>*5% credit card charge will apply (the evil bank wants it!)</small>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@stop