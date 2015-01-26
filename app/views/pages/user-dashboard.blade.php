@extends('layouts.default')
@section('cssfile')
@stop

@section('content')
    <link href="{{ cached_asset('/css/user.css', true) }}" rel="stylesheet"/>
    <div class="main-body-container">
        <div class="row navigator">
            <div class="bs-component">
                <div class="navbar navbar-default">
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{route('user-dashboard')}}">Make a new booking</a></li>
                            <li><a href="{{route('user-profile')}}">My profile</a></li>
                            <li><a href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li><a href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li ><a href="{{route('user-feedback')}}">Give us feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 0 0 100px;background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
            <div class="col-md-8 padding-left-60">
                <h3>Welcome to your dashboard! </h3>
                <h3>You can manage your profile and view/edit bookings here.</h3>
            </div>
        </div>
    </div>
@stop

@section('jsfile')
@stop