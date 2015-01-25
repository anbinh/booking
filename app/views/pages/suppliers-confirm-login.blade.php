@extends('layouts.default')
@section('cssfile')
    <link href="{{ cached_asset('css/jRating.jquery.css', true) }}" rel="stylesheet"/>
    <link href="{{ cached_asset('/css/supplier.css', true) }}" rel="stylesheet"/>
    <link href="{{ cached_asset('/css/supplier-confirm.css', true) }}" rel="stylesheet"/>
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
                    <li class="steps__item steps__item--last" disabled="disabled"><a href="#"
                                                                                     class="steps__link">Check out</a></li>
                </ol>
            </div>
        </div>
        <div class="row main-element-container">
            <div class="review-review col-md-12">
                <div class="row">
                    <div class="confirm-signin col-md-6">
                        <h3 style="text-decoration:underline">Booking details</h3>
                        <ul>
                            <li>
                                Supplier: {{$supplier->company_name}}
                            </li>
                            <li>
                                Service: {{$service->name}}
                            </li>
                            <li>
                                Date: {{$date_selected}}
                            </li>
                            <li>
                                Time: {{$time_selected}}
                            </li>
                            <li>
                                Number of hours: {{$duration_selected}}
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-default btn-primary confirmation-text" style="width: 80%"
                                   href="{{route('suppliers');}}" role="button">Change my booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="confirm-signin col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="inline-block">Cost of service</h3>

                                <h3 class="inline-block pull-right">AED xxxxxx</h3>
                            </div>
                        </div>
                        <form class="form-horizontal" action="#" method="get">
                            <div class="form-group">
                                <label for="promotion_code" class="col-sm-6 control-label text-aglign-left">Enter
                                    promotion code</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="promotion_code"
                                           id="promotion_code"
                                           placeholder="Promotion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other_required" class="col-sm-12 control-label text-aglign-left">Do
                                    you have any specific requests/requirements from the supplier?
                                </label>

                                <div class="col-sm-12">
                                            <textarea class="form-control" placeholder="" name="other_required"
                                                      rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <a class="btn btn-default btn-primary confirmation-text" style="width: 80%"
                                       href="{{route('suppliers-checkout', ['id_code' => $supplier->id])}}" role="button">Process to checkout</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop