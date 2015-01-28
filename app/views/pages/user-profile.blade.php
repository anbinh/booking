@extends('layouts.default')
@section('cssfile')
@stop

@section('content')
    <link href="{{ cached_asset('/css/user.css', true) }}" rel="stylesheet"/>
    <div class="main-body-container">
        <div class="row navigator">
            <div class="bs-component">
                <div class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        {{--<a class="navbar-brand" href="javascript:void(0)">Make a new booking</a>--}}
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-dashboard')}}">Make a new booking</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12 active"><a class="col-sm-12" href="{{route('user-profile')}}">My profile</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-feedback')}}">Give us feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-element-container">
            <form class="form-horizontal" action="#" method="post">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 div-left-col">
                            <h3>Tell us about yourself:</h3>
                            <div class="form-group">
                                <label for="name" class="col-sm-5 control-label text-aglign-left">*Name:
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" id="name"
                                           required="required" placeholder="Your name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sex" class="col-sm-5 control-label text-aglign-left">Sex:
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="service" name="service">
                                        <option name="sex" value="0">
                                            Male
                                        </option>
                                        <option name="sex" value="1">
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nation"
                                       class="col-sm-5 control-label text-aglign-left">Nationality:</label>
                                <div class="col-sm-7">
                                    <select name="nation" class="form-control" id="nation" name="nation">
                                    @foreach($nationals as $na)
                                        <option name="nation" value="{{$na}}">
                                                {{$na}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <h3>Change your password:</h3>
                            <div class="form-group">
                                <label for="currentPassword" class="col-sm-5 control-label text-aglign-left">*Current password:
                                </label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="currentPassword" id="currentPassword"
                                           required="required" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newPassword" class="col-sm-5 control-label text-aglign-left">*New password:
                                </label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="newPassword" id="newPassword"
                                            >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword"
                                       class="col-sm-5 control-label text-aglign-left">*Confirm password:</label>

                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="confirmPassword"
                                           id="confirmPassword" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>How can we reach you?</h3>
                            <div class="form-group">
                                <label for="phoneNumber" class="col-sm-4 control-label text-aglign-left">*Phone number:
                                </label>

                                <div class="col-sm-8">
                                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber"
                                           required="required" placeholder="Your phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-4 control-label text-aglign-left">Address (line 1):
                                </label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address1" id="address1"
                                           placeholder="Your address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address2"
                                       class="col-sm-4 control-label text-aglign-left">Address (line 2):</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address2"
                                           id="address2" placeholder="Your another address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city"
                                       class="col-sm-4 control-label text-aglign-left">*City:</label>

                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="city"
                                           required="required" id="city" placeholder="Your city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="area"
                                       class="col-sm-4 control-label text-aglign-left">Area:</label>

                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="area"
                                           required="required" id="area" placeholder="Your area">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Your profile is safe with us. Please read <a href="#">our privacy policy</a>.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary  pull-right">Update profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('jsfile')
@stop