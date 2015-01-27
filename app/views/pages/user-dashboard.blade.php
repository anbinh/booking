@extends('layouts.default')
@section('cssfile')
    <link rel="stylesheet" href="{{ cached_asset('home_page/css/include-landing.css', true) }}">
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
                            <li><a href="{{route('user-feedback')}}">Give us feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 0 0 100px;background-color: #ffffff;color: rgba(0,0,0,.84); padding-top:20px">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 padding-left-60">
                        <h3>Welcome to your dashboard! </h3>

                        <h3>You can manage your profile and view/edit bookings here.</h3>
                    </div>
                </div>
                <div class="row" id="white-box-booking" style="padding-left: 10%">
                    <div class="col-md-12">
                        <h1 id='tittle-welcome'>
                            Our Homeez will make your Home at Ease
                        </h1>
                        <hr class="accessory">
                        <div class="row">
                            <h3 class="tittle-question" style="
                                    text-align: center;
                                ">FIND SAFE, RELIABLE HELP IN YOUR NEIGHBORHOOD</h3>
                        </div>
                        <div class="row icon-handy">
                            <div class="container-fluid">
                                <form method="post" action="{{route('suppliers-post-search')}}">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
                                            <div>
                                                <strong class="text-question">What service do you need?</strong>
                                            </div>
                                            <select class="soflow-color responsive-select-option" name="service" style="float: left"
                                                    id="name_service">
                                                <option value="-1" selected="">Select an Option</option>
                                                <option name="service" value="1" selected="">
                                                    Handy Homie
                                                </option>
                                                <option name="service" value="2" selected="">
                                                    Gardening Homie
                                                </option>
                                                <option name="service" value="3" selected="">
                                                    Cleaning Homie
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
                                            <div>
                                                <strong class="text-question">When do you need it for?</strong>
                                            </div>
                                            <input id="datepicker" type="text" placeholder="mm/dd/yyyy" style="-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
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
												padding-left: 15px;
												" name="date"/>

                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
                                            <div>
                                                <strong class="text-question">For how long?</strong>
                                            </div>
                                            <select class="soflow-color responsive-select-option" name="duration"
                                                    id="long_service" style="float:left">
                                                @for($i = 1; $i < 11; $i++)
                                                    <option value="{{$i}}">
                                                    {{$i}} Hours</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
                                            <div>
                                                <strong class="text-question">Where do you live?</strong>
                                            </div>

                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 thumb" style="
    padding-left: 0px;
    padding-right: 0px;
">
                                                <select class="soflow-color responsive-select-option"
                                                        style="margin-left: 6px; width :85%" name="area" id="area">
                                                    <option>Area</option>
                                                    <option>Dubai</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                                                <select class="soflow-color responsive-select-option"
                                                        style="/* margin-left:0; */ width: 100%;/* margin-right: 0px; */padding-left: 7px;padding-right: 0px;"
                                                        name="city" id="city">
                                                    <option>City</option>
                                                    <option>Al Badaa</option>
                                                    <option>Al Barsha</option>
                                                    <option>Al Hamriya</option>
                                                    <option>Al Hudaiba</option>
                                                    <option>Al Jafeliah</option>
                                                    <option>Al Karama</option>
                                                    <option>Al Mankhool</option>
                                                    <option>Al Qouz</option>
                                                    <option>Al Refaa</option>
                                                    <option>Al Sofouh</option>
                                                    <option>Al Souq Al Kabeer</option>
                                                    <option>Al Wasl</option>
                                                    <option>Jumeirah</option>
                                                    <option>Madinat Dubai Al Melaheyah</option>
                                                    <option>Oud Metha</option>
                                                    <option>Satwa</option>
                                                    <option>Trade Center 1</option>
                                                    <option>Trade Center 2</option>
                                                    <option>Umm Hurair</option>
                                                    <option>Umm Suqeim</option>
                                                    <option>Al Qouz (ALkhail Gate Project)</option>
                                                    <option>Al Safa</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
                                            <div>
                                                <strong class="text-question">Time flexibility: +- 1 hour</strong>
                                            </div>
                                            <style>
                                                body {
                                                    background: #3bc0c3;
                                                }

                                                .checkboxWrapper {
                                                    width: 98px;
                                                    height: 40px;
                                                    position: relative;
                                                    /*margin: 20px auto;*/
                                                    -webkit-border-radius: 60px;
                                                    -moz-border-radius: 60px;
                                                    border-radius: 60px;
                                                    background: #E6C130;
                                                }

                                                .checkboxWrapper label {
                                                    position: absolute;
                                                    left: 60px;
                                                    top: 2px;
                                                    width: 36px;
                                                    height: 36px;
                                                    -webkit-border-radius: 28px;
                                                    -moz-border-radius: 28px;
                                                    border-radius: 28px;
                                                    background: #b6c2c9;
                                                    -webkit-transition: .2s;
                                                    -moz-transition: .2s;
                                                    -ms-transition: .2s;
                                                    -o-transition: .2s;
                                                    transition: .2s;
                                                    cursor: pointer;
                                                }

                                                .checkboxWrapper svg {
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                    pointer-events: none;
                                                }

                                                .checkboxWrapper svg path {
                                                    stroke: #fff;
                                                    stroke-linecap: round;
                                                    stroke-width: 4;
                                                    -webkit-transition: opacity 0.1s;
                                                    transition: opacity 0.1s;
                                                    fill: none;
                                                    -webkit-transition: stroke-dashoffset 0.2s;
                                                    transition: stroke-dashoffset 0.2s;
                                                }

                                                .checkboxWrapper .checkmark path {
                                                    opacity: 0;
                                                }

                                                .checkboxWrapper .checkmark path:first-child {
                                                    stroke-dashoffset: 27px;
                                                }

                                                .checkboxWrapper .checkmark path:last-child {
                                                    stroke-dashoffset: 11px;
                                                }

                                                .checkboxWrapper .cross path {
                                                    opacity: 1;
                                                    stroke-dashoffset: 0px;
                                                }

                                                .checkboxWrapper input[type=checkbox] {
                                                    display: none;
                                                }

                                                .checkboxWrapper input[type=checkbox]:checked + label {
                                                    left: 4px;
                                                    background: #2ECC71;
                                                }

                                                .checkboxWrapper input[type=checkbox]:checked + label .checkmark path {
                                                    opacity: 1;
                                                    stroke-dashoffset: 0px;
                                                }

                                                .checkboxWrapper input[type=checkbox]:checked + label .cross path {
                                                    opacity: 0;
                                                    stroke-dashoffset: 13px;
                                                }

                                            </style>
                                            <label class="tasks-check-list-item">
                                                <div class="checkboxWrapper">
                                                    <input type="checkbox" id="myCheckbox" checked=""
                                                           name="flexibility">
                                                    <label for="myCheckbox">
                                                        <svg class="checkmark" width="56" height="56">
                                                            <path d="m16,28 l14,-16"
                                                                  style="stroke-dasharray: 27px;"></path>
                                                            <path d="m16,28 l-8,-9"
                                                                  style="stroke-dasharray: 11px;"></path>
                                                        </svg>
                                                        <svg class="cross" width="56" height="56">
                                                            <path d="m20,20 l-8,-8"
                                                                  style="stroke-dasharray: 13px;"></path>
                                                            <path d="m20,20 l8,8"
                                                                  style="stroke-dasharray: 13px;"></path>
                                                            <path d="m20,20 l-8,8"
                                                                  style="stroke-dasharray: 13px;"></path>
                                                            <path d="m20,20 l8,-8"
                                                                  style="stroke-dasharray: 13px;"></path>
                                                        </svg>
                                                    </label>
                                                </div>

                                            </label>

                                        </div>
                                    </div>
                                    <div id="booking-button-container">
                                        <button class="boton" type="submit" style="
                                                                                    position: relative;
                                                                                    top: 50%;
                                                                                    left: 32%;
"                                                         >Booking
                                        </button>
                                    </div>


                                </form>
                            </div>
                        </div>

                        <div class="analytics-event-post" data-event-name="zipcode_input_on_homepage"
                             data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('jsfile')
    <script>$("#datepicker").datepicker();</script>
@stop