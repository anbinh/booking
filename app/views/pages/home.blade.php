@extends('layouts.default')
@section('content')
	<div id="preload">
		<img src="{{ asset('home_page/img/bcg_slide-1.jpg') }}">
		<img src="{{ asset('home_page/img/bcg_slide-2.jpg') }}">
		<img src="{{ asset('home_page/img/bcg_slide-3.jpg') }}">
		<img src="{{ asset('home_page/img/bcg_slide-4.jpg') }}">
	</div>
	<main>   	 
        <section id="slide-1" class="homeSlide" id="section-1-plusCss">
        	<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1" id = "bcg-slide1-plusCss">
	        	<div class="hsContainer">
	        
					
					
					<div class="white-contain"> 
					
						<div class='main-page-header'>
							<div class = "row">
								<h1 class='navbar-brand-main'>
									{{trans ('greetings.Welcome to the Homeez')}}
								</h1>
							</div>
							
							<div class = "row icon-handy">
							 	<div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handyone">
						          
						        	</div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handytwo">
						          
						        	</div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handythree">
						          
						        	</div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handyfour">
						          
						        	</div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handyfive">
						          
						        	</div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-xs-4 thumb">
					                <div title="handyman2" class="handyman img-center" id="handysix">
						          
						        	</div>
					            </div>
								
								
							</div>
							
							<div class = "row">
								<div class = "col-ls-6 col-md-6 col-sm-6">
									
									<p class = "bigtext">{{trans ('greetings.Book expert home cleaners')}}</p> 
									
									<a href="#" class="big-button btn-secondary block-and-center call-to-action btn_SeeAll_fisrt push-top">{{trans ('greetings.Book a Cleaning')}}</a>
								</div>
								
								<div class = "col-ls-6 col-md-6 col-sm-6">
									<p class = "bigtext">What service do you need?</p>
									<a href="{{URL::to('list-service')}}" class="big-button btn-alternate push-top block-and-center call-to-action btn_SeeAll_second" >List of Sevices</a>
								</div>
							</div>
							<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}">
						</div>  		
		    		</div>
					</div>
					
			
	        	</div>
        	</div>
   		</section>
		    
		<section id="slide-2" >
		    <div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-2" id = "slide-2-plusCss">
	    		<div class="hsContainer" id = "hsContainer-slide2-plusCss">	
					<div class="row" id = "row-slide2-plusCss">
			            <div class="col-sm-4">
			                <img  id = "img-slideplusCss" class="img-circle img-responsive img-center" src="{{ asset('home_page/img/33.png') }}" alt="">
			                <h3>{{trans ('greetings.Marketing Box #1')}}</h3>
			                <p>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat')}}</p>
			            </div>
			            <div class="col-sm-4">
			                <img class="img-circle img-responsive img-center" src="{{ asset('home_page/img/23.png') }}" alt="">
			                <h3>{{trans ('greetings.Marketing Box #2')}}</h3>
			                <p>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat')}}</p>
			            </div>
			            <div class="col-sm-4">
			                <img class="img-circle img-responsive img-center" src="{{ asset('home_page/img/35.png') }}" alt="">
			                <h3>{{trans ('greetings.Marketing Box #3')}}</h3>
			                <p>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat')}}</p>
			            </div>
			        </div>
	        	</div>
	    	</div>
	    </section>
	    
		<section id="slide-3">
			<div class="bcg skrollable skrollable-before" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-bottom-top="background-position: 50% 100px;" data-anchor-target="#slide-3" id = "slide-3-plusCss">
				<div class="hsContainer">
					<div class='main-content-row-no-padding bottom-line' >
					
						<div class='main-content-row bottom-line' id = "main-content-slide3-plusCss">
							<div class="row">
								<div class="col-lg-5 col-sm-6">
									<hr class="section-heading-spacer">
									<div class="clearfix"></div>
									<p class='home-download-app-header color-53A524' >{{trans ('greetings.Claritas est etiam')}}</p>
									<p class = "bigtext color-53A524">{{trans ('greetings.Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.')}} 
										<a href="https://miratik.com/">{{trans ('greetings.Mirum est notare quam littera gothica')}}</a> {{trans ('greetings.est etiam processus.')}}
									</p>
								</div>
								<div class="col-lg-5 col-lg-offset-2 col-sm-6" id = "margin-bottom-5">
									<img class="img-responsive" src="http://ironsummitmedia.github.io/startbootstrap-landing-page/img/phones.png" alt="">
								</div>
							</div>
						</div>
						<div id="carousel-example-generic" class="carousel slide">
							<!-- Indicators -->
							<!-- Controls -->
						</div>
						<div class='main-content-row'>
							<div class='row'>
								<h3 class='section-block-header pad-top color-white'>{{trans ('greetings.Ready to start?')}}</h3>
							</div>
							<div class='small-12 columns two-button-row' id = "main-content-slides3-plusCss">
								<a href="#" class="big-button btn-secondary call-to-action btn_SeeAll_fisrt-last">Getting Started</a>
								<a href="{{URL::to('list-service')}}" class="big-button btn-invert-secondary call-to-action btn_SeeAll_second-last">All Us Services</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 
	</main>
	<script src="{{ asset('home_page/js/include-landing.js') }}"></script>
	<script src="{{ asset('home_page/js/jquery.min.js') }}"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="{{ asset('home_page/js/imagesloaded.js') }}"></script>
	<script src="{{ asset('home_page/js/skrollr.js') }}"></script>
	<script src="{{ asset('home_page/js/_main.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('home_page/css/include-landing.css') }}">

@stop