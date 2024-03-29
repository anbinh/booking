@extends('layouts.default')
@section('content')
<link href="{{ cached_asset('css/jRating.jquery.css', true) }}" rel="stylesheet"/>
<link href="{{ cached_asset('/css/supplier.css', true) }}" rel="stylesheet"/>
    <div class="main-body-container" style="padding-top: 80px;padding-bottom: 20px">
        <div class="row row main-element-container">
            <div class="review-review col-md-12">
                <div class="row">
                    <div class="review-header col-md-12">
                        <h1>Review for</h1>
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
                                <h3>{{$supplier->company_name}}</h3>
                            </div>
                            <div class="col-md-3 pull-right vcenter" style="width: 23%">
                                <a class="btn btn-default btn-primary" href="{{route('suppliers');}}" role="button">Back to results</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="review-content col-md-12">
                        {{--@for($i =0; $i< 10; $i++)--}}
                        @foreach($reviews as $re)
                            <div class="row" style="margin-left: 0; margin-right: 0; margin-bottom: 15px; padding-bottom: 15px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>{{$re->username}} said:</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$re->review_title}}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                @for($i = 0; $i < $re->rating_start; $i++)
                                                <img alt="1" src="/css/icons/star-on.png" title="poor">&nbsp;
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{$re->review_content}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            {{explode(" ",$re->created_at)[0]}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{--@endfor--}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop