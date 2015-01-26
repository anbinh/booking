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
                            <li><a href="{{route('user-dashboard')}}">Make a new booking</a></li>
                            <li><a href="{{route('user-profile')}}">My profile</a></li>
                            <li><a href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li class="active"><a href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li><a href="{{route('user-feedback')}}">Give us feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-element-container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Service</th>
                                    <th>Supplier</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>Starting</th>
                                    <th>Payment</th>
                                    <th>Note</th>
                                </thead>
                                @for($i  = 0; $i< 10; $i ++)
                                <tr>
                                    <td>Cleaning</td>
                                    <td>XXXXXX</td>
                                    <td>01/26/2014</td>
                                    <td>3</td>
                                    <td>12:06</td>
                                    <td>cash</td>
                                    <td>Nothing</td>
                                </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jsfile')
@stop