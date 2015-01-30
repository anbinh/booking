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
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-current-booking')}}">Manage bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12"><a class="col-sm-12" href="{{route('user-past-booking')}}">Past bookings</a></li>
                            <li class="col-md-25 col-sm-12 col-xs-12 active"><a class="col-sm-12" href="{{route('user-feedback')}}">Give us feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-element-container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3>At Homeez, we keep you (our Homie) at the centre of our service.</h3>
                        <h3>We will always strive to keep you happy and are eager to know about any concerns</h3>
                    </div>
                </div>
                <div class="row">
                    <form class="form-horizontal" action="" method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-sm-5 control-label text-aglign-left">*How happy does Homeez make you?
                                </label>
                                <div class="col-sm-7">
                                    <div class="rating-star-div" data-score="3"></div>
                                    <input type="hidden" name="rating_star" id="rating-star-input">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-5 control-label text-aglign-left">What do you like about Homeez?
                                </label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" placeholder="" name="title"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-5 control-label text-aglign-left">What can we do to make you happier?

                                </label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" placeholder="" name="content"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Submit (Thanks)</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('jsfile')
    <script>
        $("div.rating-star-div").raty({
            score: function() {
                return $(this).attr('data-score');
            },
            click: function(score, evt) {
                $("input#rating-star-input").val(score);
            }
        });
    </script>
@stop