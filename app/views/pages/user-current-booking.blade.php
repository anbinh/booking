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
                            <li @if(!isset($hidden) || !$hidden)class="active" @endif><a href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li @if(isset($hidden) && $hidden)class="active" @endif><a href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li ><a href="{{route('user-feedback')}}">Give us feedback</a></li>
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
                                    @if(!isset($hidden) || !$hidden)
                                        <th></th>
                                        <th></th>
                                    @endif
                                </thead>
                                @foreach($tasks as $t)
                                <tr>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->company_name}}</td>
                                    <td>{{explode(' ',$t->date)[0]}}</td>
                                    <td>{{$t->duration}}</td>
                                    <td>{{gmdate('H:i', $t->starting_time)}}</td>
                                    <td> @if($t->payment_type == 0) Credit @else Cash @endif </td>
                                    <td>{{$t->note}}</td>
                                    @if(!isset($hidden) || !$hidden)
                                        <td><button class="btn btn-primary padding-20">Change</button></td>
                                        <td><button class="btn btn-primary padding-20">Cancel</button></td>
                                    @endif
                                </tr>
                                @endforeach
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