@extends('layouts.default')
@section('content')
    <link href="{{ cached_asset('/css/jRating.jquery.css', true) }}" rel="stylesheet"/>
    <link href="{{ cached_asset('/css/supplier.css', true) }}" rel="stylesheet"/>
    <div class="main-body-container" style="padding-top: 80px;padding-bottom: 20px">
        <div class="row progress-status-bar">
            <div class="col-md-12">
                <ol class="steps">
                    <li class="steps__item steps__item--active steps__item--first"><a href="#" class="steps__link">Select
                            a supplier</a></li>
                    <li class="steps__item" disabled="disabled"><a href="#" class="steps__link">Confirm the booking</a>
                    </li>
                    <li class="steps__item steps__item--last" disabled="disabled"><a href="#"
                                                                                     class="steps__link">Check out</a></li>
                </ol>
            </div>
        </div>
        <div class="row" style="padding: 0 0 100px;background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
            <div class="col-md-3" style="padding-left: 30px">
                @if(Session::has('error'))<h5>{{Session::get('error')}}</h5>@endif
                <div class="row">
                    <div class="col-md-12">
                        <h3>Modify your search</h3>
                        <form class="form-horizontal" method="post" action="{{route('suppliers-post-search')}}">
                            <div class="form-group">
                                <label for="service" class="col-lg-4 col-md-4 col-xs-4">Service</label>
                                <div class="col-lg-8 col-md-8 col-xs-8">
                                    <select class="form-control" id="service" name="service">
                                        <option value="-1"
                                                @if($service_selected == -1)
                                                    selected
                                                @endif
                                                >Select an Option</option>
                                        @foreach ($services as $s)
                                            <option name="service" value="{{$s->id}}"
                                            @if($service_selected == $s->id) selected @endif>
                                                {{ $s->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="col-lg-3 col-md-3 col-xs-3 control-label">Date</label>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{--<input id="datepicker" type="text">--}}
                                    <input id="datepicker" type="text" value="{{$date_selected}}" placeholder="dd/mm/yyyy" style="-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
												-webkit-padding-end: 20px;
												-webkit-padding-start: 2px;
												background-position: 97% center;
												background-repeat: no-repeat;
												border: 1px solid #AAA;
												font-size: inherit;
												overflow: hidden;
												padding: 5px 5px;
												text-overflow: ellipsis;
												white-space: nowrap;
												width: 65%;
												line-height: 25px;
												color: #fff;
												background-image: url(http://i62.tinypic.com/15xvbd5.png),-webkit-linear-gradient(#2ECC71, #289E5A 40%, #2ECC71);
												background-color: #2ECC71;
												border-radius: 20px;
												padding-left: 15px;" name="date"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="timepicker" class="col-lg-3 col-md-3 col-xs-3 control-label">Time</label>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{--<input id="datepicker" type="text">--}}
                                    <input id="timepicker" type="text" value="{{$time_selected}}"  placeholder="hh/mm" style="-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
												-webkit-padding-end: 20px;
												-webkit-padding-start: 2px;
												background-position: 97% center;
												background-repeat: no-repeat;
												border: 1px solid #AAA;
												font-size: inherit;
												overflow: hidden;
												padding: 5px 5px;
												text-overflow: ellipsis;
												white-space: nowrap;
												width: 65%;
												line-height: 25px;
												color: #fff;
												background-image: url(http://i62.tinypic.com/15xvbd5.png),-webkit-linear-gradient(#2ECC71, #289E5A 40%, #2ECC71);
												background-color: #2ECC71;
												border-radius: 20px;
												padding-left: 15px;" name="time" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="long_service" class="col-lg-8 col-md-8 col-xs-8">Number of hours</label>

                                <div class="col-lg-4 col-md-4 col-xs-4" style="padding-left: 5px;padding-right: 10px">
                                    <select class="form-control" id="long_service" name="duration">
                                        @for($i = 1; $i < 11; $i++)
                                            <option value="{{$i}}"
                                                @if($i == $duration_selected) selected @endif> {{$i}} Hours</option>
                                        @endfor
                                        <option value="11"
                                            @if(11 == $duration_selected) selected @endif>longer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group centered">
                                    <button type="submit" class="btn btn-primary">Modify search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12">
                        <h3>Filter search results</h3>
                        <form class="form-horizontal" id="filter-result-form">
                            <fieldset>
                                <div class="form-group">
                                    <label for="service" class="col-lg-12 control-label" style="text-align:left">By ranking: </label>
                                    <div class="col-lg-12">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"
                                                         title="poor">
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="filter-star" value="1">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"
                                                         title="poor">
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="2" src="/css/icons/star-on-small.png" title="poor">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="filter-star" value="2">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"
                                                         title="poor">
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="filter-star" value="3">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"
                                                         title="poor">
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="filter-star" value="4">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="filter-result-star" data-average="8" data-id="2"
                                                         title="poor">
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                        <img alt="1" src="/css/icons/star-on-small.png" title="poor">&nbsp;
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="filter-star" value="5">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 centered">
                                                <p>
                                                    <label for="amount">Price range:</label>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 centered">
                                                <p>
                                                    <input type="text" id="amount" readonly
                                                           style="border:0; color:#f6931f; font-weight:bold;">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="slider-range"></div>
                                                <input type="hidden" id="from-price" name="from-price" value="0">
                                                <input type="hidden" id="to-price" name="to-price" value="500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group centered">
                                    <button type="submit" class="btn btn-primary">Filter result</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h2 style="padding-top: 20px">We found these suppliers who meet your requirement</h2>
                <div class="container-fluid" id="result-supplier">
                    @foreach($suppliers as $s)
                        <div class="row row-result">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 vcenter">
                                        <a href="#" class="thumbnail">
                                            <img data-src="holder.js/140%x100" alt="140%x100"
                                                 src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDEzNCAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTM0IiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQxLjA0Njg3NSIgeT0iOTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xMzR4MTgwPC90ZXh0PjwvZz48L3N2Zz4="
                                                 data-holder-rendered="true"
                                                 style="height: 100px; width: 140px; display: block;">
                                        </a>
                                    </div>
                                    <div class="col-md-3 vcenter">
                                        <div class="row">
                                            <div class="col-md-12 vcenter">
                                                <h3>{{$s->company_name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vcenter">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="basic" data-average="{{$s->star_rate * 4}}" data-id="1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3><a href="{{route('suppliers-review', ['id_code'=> $s->id]);}}">Read reviews</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vcenter" style="width: 23%">
                                        <div class="bg-info center">AED {{$s->rate_per_hour}}</div>
                                        <a class="btn btn-default btn-primary col-md-12" href="{{route('suppliers-confirm', ['id_code'=>$s->id])}}" role="button">Book Now</a>
                                        {{--<button class="btn btn-primary btn-sm col-md-12"></button>--}}
                                    </div>
                                </div>
                                @if($s->instance != 0)
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-6">
                                            <button type="button" class="btn btn-default button-instant-enabled"
                                                    data-container="body" data-toggle="popover"
                                                    data-placement="bottom" data-content="You can book services from this supplier without waiting for their confirmation">
                                                <b>Instant booking enabled!</b>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('jsfile')
    <script src="{{ cached_asset('/js/supplier.js', true)}}"></script>
@stop