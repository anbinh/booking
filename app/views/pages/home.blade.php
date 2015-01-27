@extends('layouts.default')
@section('content')	
<script>
function select_supplier() {

	
	$('form').submit(function(e){
		e.preventDefault();
		$name_service = $("#name_service").val();
		$date = $("#datepicker").val();
		$area = $("#area").val(); 
		$city = $("#city").val();
		$flexibility =$("#flexibility").is(":checked");
		$.post('ajax',{name_service :$name_service,date: $date,area :$area, city: $city, flexibility: $flexibility}, function(data){
			console.log(data);	
			$("#white-box-booking").html(data);
		});	
	});
}

</script>

	<main>   	 
    <section id="slide-1">
		<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1" id = "bcg-slide1-plusCss">
			<div class="hsContainer">
				
				
					<div class='main-page-header'>
						<div class="row" id = "white-box-booking">
							<h1 id='tittle-welcome'>
								Our Homeez will make your Home at Ease
							</h1>
							<hr class="accessory">
							<div  class="row">
								<h3 class = "tittle-question">FIND SAFE, RELIABLE HELP IN YOUR NEIGHBORHOOD</h3>
							</div>	
							<div class = "row icon-handy">
								<div class = "container-fluid">
								<form method = "post" aciton = "#">	
									<div class = "row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
											<div>
											    <strong class = "text-question">What service do you need?</strong>
											</div>
											<select class ="soflow-color responsive-select-option" name= "name_service" id = "name_service">
										
												<option>Select an Option</option>
												<option>Cleaning Homie</option>
												<option>Handy Homie</option>
												<option>Gardening Homie</option>
											</select>
											
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
											<div>
											    <strong class = "text-question">When do you need it for?</strong>
											</div>
										  <input id="datepicker" type = "text" placeholder = "mm/dd/yyyy" style = "-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
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
												" name= "date"/>
											
										</div>
									
								
									
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
											<div>
											    <strong class = "text-question">For how long?</strong>
											</div>
											<select class="soflow-color responsive-select-option" name= "long_service" id = "long_service">
											
												<option>Select an Option</option>
												<option>1 hours</option>
												<option>2 hours</option>
												<option>3 hours</option>
												<option>4 hours</option>
												<option>5 hours</option>
												<option>6 hours</option>
												<option>7 hours</option>
												<option>8 hours</option>
												<option>9 hours</option>
												<option>10 hours</option>
												<option>longger</option>
											</select>
											
										</div>
									</div>
									<div class = "row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
											<div>
											    <strong class = "text-question">Where do you live?</strong>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 thumb">
											</div>
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 thumb">
												<select class="soflow-color responsive-select-option" style="margin-left: 6px; width :85%" name= "area" id = "area">	
													<option>Area</option>
													<option>Dubai</option>
												</select>
											</div>	
											
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 thumb">
												<select class="soflow-color responsive-select-option"  style = "margin-left:0; width: 85%" name= "city" id = "city">
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
													<option>Umm  Suqeim</option>
													<option>Al Qouz (ALkhail Gate Project)</option>
													<option>Al Safa</option>
												</select>
											</div>
											
											
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumb">
											<div>
											    <strong class = "text-question">Time flexibility: +- 1 hour</strong>
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

											.checkboxWrapper .checkmark path:first-child{
											  stroke-dashoffset: 27px;
											}

											.checkboxWrapper .checkmark path:last-child{
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
													<input type="checkbox" id="myCheckbox" checked name = "flexibility"/>
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
									<div id = "booking-button-container">
											<button class="boton" type = "submit" onclick = "select_supplier()">Booking</button>
									</div>
									
									
							</form>
								</div>
							</div>
						
							<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}">
							</div>  		
					
							
						</div>
					</div>
				
				
			</div>
		</div>
	</section>
      
	<section id="slide-3">
		<div class="bcg skrollable skrollable-before" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-bottom-top="background-position: 50% 100px;" data-anchor-target="#slide-3" id = "slide-3-plusCss">
			<div class="hsContainer">
				<div class='main-content-row-no-padding bottom-line'>
					<div class="wrapper">
					  <div class="steps">
					  <h1 id = "how-to-booking">Simple and Easy booking process</h1>
						<div class="step">
						  <dl>
							<dd class="text">
							  <div class="number">
								1
							  </div>
							  <div class="title">
								 Select the service
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://todomvc.com/site-assets/logo-icon.png" />
							</dd>
						  </dl>
						</div>
						
						<div class="step">
						  <div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								2
							  </div> 
						  <div class="title">
								Select the time
							  </div>
							  <p class = "responsive-font-size-step">
								 Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://www.bookmylab.com/images/000-bml-scheduler.png" />
							  </dd>
						  </dl>
						</div>
						
						<div class="step">
						  <div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								3
							  </div> 
						  <div class="title">
								 Choose the Supplier
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://icons.iconarchive.com/icons/mcdo-design/book/256/Address-Book-blue-icon.png" />
						  </dd>
						  </dl>
						</div>
						<div class="step">
							<div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								4
							  </div>
							  <div class="title">
								Pay
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://www.webhostingreviewjam.com/wp-content/uploads/2013/02/payment-icon.png" />
							</dd>
						  </dl>
						</div>
					</div>
				</div>
				
				<div class='main-content-row-no-padding bottom-line'>
					<div class="wrapper">
					  <div class="steps">
					  <h1 id = "how-to-booking">Register with us and see the difference</h1>
						<div class="step">
						  <dl>
							<dd class="text">
							  <div class="number">
								1
							  </div>
							  <div class="title">
								 Select the service
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://todomvc.com/site-assets/logo-icon.png" />
							</dd>
						  </dl>
						</div>
						
						<div class="step">
						  <div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								2
							  </div> 
						  <div class="title">
								Select the time
							  </div>
							  <p class = "responsive-font-size-step">
								 Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://www.bookmylab.com/images/000-bml-scheduler.png" />
							  </dd>
						  </dl>
						</div>
						
						<div class="step">
						  <div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								3
							  </div> 
						  <div class="title">
								 Choose the Supplier
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://icons.iconarchive.com/icons/mcdo-design/book/256/Address-Book-blue-icon.png" />
						  </dd>
						  </dl>
						</div>
						<div class="step">
							<div class="arrow-right"></div>
						  <dl>
							<dd class="text">
							  <div class="number">
								4
							  </div>
							  <div class="title">
								Pay
							  </div>
							  <p class = "responsive-font-size-step">
								Leave some space underneath for details.
							  </p>
							</dd>
							<dd class="pic">
						  <img class="icon" src="http://www.webhostingreviewjam.com/wp-content/uploads/2013/02/payment-icon.png" />
							</dd>
						  </dl>
						</div>
					</div>
				</div>
				<!-- <div class='main-content-row bottom-line' id = "main-content-slide3-plusCss" style = "padding-bottom: 2em;">
					<h1 id = "how-to-booking">Why list services on Homeez?</h1>
					<div class="wrapper">
						<div class="col-md-3 ">
							<img src="{{ asset('home_page/img/82.png') }}"/>
							<h4 style="color:#4E4E4E">Claritas est etiam processus</h4>
							<p style="color:#4E4E4E;font-size:14px">
								Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum
							</p>
						</div>
						<div class="col-md-3 ">
							<img src="{{ asset('home_page/img/82.png') }}"/>
							<h4 style="color:#4E4E4E">Claritas est etiam processus</h4>
							<p style="color:#4E4E4E;font-size:14px">
								Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum
							</p>
						</div>
						<div class="col-md-3 ">
							<img src="{{ asset('home_page/img/82.png') }}"/>
							<h4 style="color:#4E4E4E">Claritas est etiam processus</h4>
							<p style="color:#4E4E4E;font-size:14px">
								Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum
							</p>
						</div>
						<div class="col-md-3 ">
							<img src="{{ asset('home_page/img/82.png') }}"/>
							<h4 style="color:#4E4E4E">Claritas est etiam processus</h4>
							<p style="color:#4E4E4E;font-size:14px">
								Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum
							</p>
						</div>
					</div>
				</div>-->
				
					<div class='main-content-row bottom-line' id = "main-content-slide3-plusCss" style = "background-color: rgb(244, 244, 244);">
						<div class="row">
							<div class="col-lg-5 col-sm-6">
								<img class="img-responsive" src="http://partstock.com/sites/default/files/bestchoice.png" alt="">
							</div>
							<div class="col-lg-5 col-lg-offset-2 col-sm-6 margin-bottom-5">
								
								<hr class="section-heading-spacer">
								<div class="clearfix"></div>
								<p class='home-download-app-header color-53A524' >{{trans ('greetings.Claritas est etiam')}}</p>
								<p class = "bigtext color-53A524">{{trans ('greetings.Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.')}} 
									<a href="https://miratik.com/">{{trans ('greetings.Mirum est notare quam littera gothica')}}</a> {{trans ('greetings.est etiam processus.')}}
								</p>
							</div>
						</div>
					</div>
					<div class='main-content-row'>
						<div class='row'>
							<h3 class='section-block-header pad-top color-white style-Shojumaru'>{{trans ('greetings.Ready to start?')}}</h3>
						</div>
						<div class='small-12 columns two-button-row' id = "main-content-slides3-plusCss">
							<a href="#" class="big-button btn-secondary call-to-action btn_SeeAll_fisrt style-Shojumaru">Getting Started</a>
							<a href="{{URL::to('list-service')}}" class="big-button btn-invert-secondary call-to-action btn_SeeAll_second style-Shojumaru">All Us Services</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
	</main>
	<script src="{{ cached_asset('home_page/js/include-landing.js', true) }}"></script>
	 
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="{{ cached_asset('home_page/js/imagesloaded.js', true) }}"></script>
	<script src="{{ cached_asset('home_page/js/skrollr.js', true) }}"></script>
	<script src="{{ cached_asset('home_page/js/_main.js', true) }}"></script>
	<link rel="stylesheet" href="{{ cached_asset('home_page/css/include-landing.css', true) }}">
	
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script>
			$("#datepicker").datepicker();
	</script>
	
@stop