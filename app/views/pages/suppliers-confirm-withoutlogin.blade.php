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
                    <div class="confirm-header col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center ">
                                    So you want to book a <b>{{$service->name}}</b> from <b>[{{$supplier->company_name}}]</b> for <b> {{$duration_selected}} hours </b> at <b> {{$time_selected}} </b>
                                    on <b> {{$date_selected}} </b>?
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-default btn-primary col-md-6 pull-right confirmation-text"
                                   href="{{route('suppliers');}}" role="button">No, I want to change my booking</a>
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
                            <div class="confirm-signin col-md-6">
                                <h3 style="text-decoration:underline">Sign in</h3>
                                <form class="form-horizontal" action="{{route('login-page')}}" method="post">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label text-aglign-left">Email
                                            address:</label>

                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email"
                                                   required="required" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"
                                               class="col-sm-4 control-label text-aglign-left">Password:</label>

                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password"
                                                   required="required" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <a href="{{route('restore-page')}}" class="alt-link col-md-6 pull-right">Forgot
                                            password?</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-default btn-primary col-md-4 pull-right">
                                                Sign in
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group social-login">
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-social btn-facebook clear-visited-style"
                                               href="{{route('facebookAuth')}}">
                                                <i class="fa fa-facebook"></i> Sign in with Facebook
                                            </a>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-social btn-google-plus clear-visited-style"
                                               href="{{route('googleAuth')}}">
                                                <i class="fa fa-google-plus"></i>Sign in with Google
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="confirm-signin col-md-6">
                                <h3 style="text-decoration:underline">Create a new account</h3>
                                <form class="form-horizontal" action="{{route('login-page')}}" method="post">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label text-aglign-left">Name: </label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="name" id="name"
                                                   required="required" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label text-aglign-left">Email
                                            address:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email"
                                                   required="required" placeholder="Your email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"
                                               class="col-sm-4 control-label text-aglign-left">Phone number:</label>
                                        <div class="col-sm-8">
                                            <input type="tel" class="form-control" name="phone"
                                                   required="required" id="phone" placeholder="Your phone number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"
                                               class="col-sm-4 control-label text-aglign-left">Password:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password"
                                                   required="required" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm"
                                               class="col-sm-4 control-label text-aglign-left">Confirm password:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password-confirm"
                                                   required="required" id="password-confirm" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-primary col-md-4 pull-right">
                                            Create now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop