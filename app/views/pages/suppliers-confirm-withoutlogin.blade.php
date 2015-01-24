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
                    <li class="steps__item steps__item--active steps__item--first" disabled="disabled"><a href="#" class="steps__link">Confirm the booking</a>
                    </li>
                    <li class="steps__item steps__item--last" disabled="disabled"><a href="#"
                                                                                     class="steps__link">Pay</a></li>
                </ol>
            </div>
        </div>
        <div class="row" style="background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
            <div class="review-review col-md-12">
                <div class="row">
                    <div class="confirm-header col-md-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center ">
                                    So you want to book a Cleaning homie from [Supplier name] for 5 hours at 19:00 hours on 25/12/2015?ádlfajsdlfkjasdlfjlasdjflajsdflajsdlfajsdlfkajdslfjasldfjsadlkfjlaskdjflkadsjflajdslfjasldfjalsdkfjlaskdjfl
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <a class="btn btn-default btn-primary col-md-12 confirmation-text" href="{{route('suppliers');}}" role="button">No, I want to change my booking</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <p>To confirm, either:</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="confirm-signin col-md-5">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Email address:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <div class="even-medium center">
                                                <a href="{{route('restore-page')}}" class="alt-link">Forgot password?</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-default btn-primary col-md-12">Sign in</button>
                                        </div>
                                    </div>
                                    <div class="form-group social-login">
                                        <div class="col-md-12">
                                            <a class="btn btn-info btn-block btn-social btn-facebook" href="{{route('facebookAuth')}}">
                                                <i class="fa fa-facebook"></i> Sign in with Facebook
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="btn btn-info btn-block btn-social btn-google-plus" href="{{route('facebookAuth')}}">
                                                <i class="fa fa-facebook"></i> Sign in with Facebook
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="btn btn-info btn-block btn-social btn-google-plus" href="{{route('googleAuth')}}">
                                                <i class="fa fa-google-plus"></i> Sign in with Google
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="confirm-signin col-md-5">
                                asdfasdfasdfasdf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop