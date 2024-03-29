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
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-profile')}}">My profile</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12 @if(!isset($hidden) || !$hidden) active @endif"><a class="col-sm-12" href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12 @if(isset($hidden) && $hidden) active @endif"><a class="col-sm-12" href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-feedback')}}">Give us feedback</a></li>
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
                                            <td>
                                                <button class="btn btn-primary padding-20" data-toggle="modal" data-target="#myModal">Change</button>
                                            </td>
                                            <td>
                                                <?php ($diff = abs(strtotime($t->date) - strtotime(date("Y-m-d H:i:s")))/64000); ?>
                                                @if($diff < 1.5)
                                                    <button class="btn btn-primary padding-20" onclick="in_24_hour()">Cancel</button>
                                                @elseif($t->payment_type == 0)
                                                    <button class="btn btn-primary padding-20" onclick="without_cash_on_delivery( {{$t->id}} )">Cancel</button>
                                                @else
                                                    <button class="btn btn-primary padding-20" onclick="with_credit_card({{$t->id}})">Cancel</button>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--data-toggle="modal" data-target="#cancel_booking"--}}

    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    <h4 class="modal-title" style="line-height: 1.3em">Please call the supplier directly regarding changes</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancel_booking">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    <h4 class="modal-title" style="line-height: 1.3em">Your booking has been cancel</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jsfile')

    <script>
        var in_24_hour = function(){
            alert("Sorry but it is too late to cancel the booking");
        }
        var without_cash_on_delivery = function(id_booking){
            $.ajax({
                url: '/cancelbooking/' + id_booking,
                success: function(result) {
                    console.log(result);
                    $('#cancel_booking').modal('show');
                    location.reload();
                }
            });
        }
        var with_credit_card = function(id_booking){
            $.ajax({
                url: '/cancelbooking/' + id_booking,
                success: function(result) {
                    console.log(result);
                    $('#cancel_booking').modal('show');
                    location.reload();
                }
            });
        }
    </script>
@stop