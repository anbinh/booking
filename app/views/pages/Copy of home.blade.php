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
					<div class='overlay'>
					</div>
					<div class='main-page-header'>
						<h1 class='hero-text'>
							<p>{{trans ('greetings.Welcome to the Homeez')}}</p>
						</h1>
						<div class='hero-support-text'>
							<p>{{trans ('greetings.Book expert home cleaners')}}</p> 
							<p>{{trans ('greetings.Just pick a time and we will do the rest.')}}</p>
						</div>
						<div class='small-12 columns hero-button-group'>
							<a href="/bookings/new?service=3" class="big-button btn-secondary block-and-center call-to-action btn_SeeAll_fisrt">{{trans ('greetings.Book a Cleaning')}}</a>
							<a href="/services" class="big-button btn-alternate push-top block-and-center call-to-action btn_SeeAll_second" >{{trans ('greetings.See All Services')}}</a>
						</div>
						<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}">
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
			                <img  id = "img-slideplusCss" class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-pros-73787a99cd341166306ff1e8af032fa8.png" alt="">
			                <h3>{{trans ('greetings.Marketing Box #1')}}</h3>
			                <p>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat')}}</p>
			            </div>
			            <div class="col-sm-4">
			                <img class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-availability-2723e0d38f0913a153d05b7a5959b93e.png" alt="">
			                <h3>{{trans ('greetings.Marketing Box #2')}}</h3>
			                <p>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat')}}</p>
			            </div>
			            <div class="col-sm-4">
			                <img class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-stamp-39f73b57011a7d707d028a0a911a79ca.png" alt="">
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
					<div class='main-content-row-no-padding bottom-line'>
						<div class='testimonials-container'>
							<p class='quote-left'></p>
							<div id="carousel-example-generic" class="carousel slide">
								<!-- Indicators -->
								<ol class="carousel-indicators hidden-xs" id = "ol-slide3-plussCss">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active" id = "li-slide3-plussCss"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								</ol>
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									
									<div class="item active">
										<div id = "item-active-slide3-plussCss">
											<h3 class='section-block-header push-top' id = "section-header-slides3-pplusCss">
												<b>{{trans ('greetings.Dont just take our word for it')}}</b>
											</h3>
											<h3>
												<b>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit')}}
													<br>{{trans ('greetings.nonummy nibh euismod tincidunt ut laoreet dolore!')}}
													<br>{{trans ('greetings.Basic version')}}
												</b>
											</h3>
										</div>
									</div>
										<div class="item">
											<div class = "color-0bb8e3">
												<h3 class='section-block-header push-top color-0bb8e3'>
													<b>{{trans ('greetings.Dont just take our word for it')}}</b>
												</h3>
												<h3>
													<b>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit')}}
													<br>{{trans ('greetings.nonummy nibh euismod tincidunt ut laoreet dolore!')}}
													<br>{{trans ('greetings.Basic version')}}
												</b>
												</h3>
											</div>
										</div>
										<div class="item">
											<div class = "color-0bb8e3">
												<h3 class='section-block-header push-top color-0bb8e3'>
													<b>{{trans ('greetings.Dont just take our word for it')}}</b>
												</h3>
												<h3>
													<b>{{trans ('greetings.Lorem ipsum dolor sit amet, consectetuer adipiscing elit')}}
													<br>{{trans ('greetings.nonummy nibh euismod tincidunt ut laoreet dolore!')}}
													<br>{{trans ('greetings.Basic version')}}
												</b>
												</h3>
											</div>
										</div>
								</div>
								<!-- Controls -->
								
								<a class="left carousel-control color-plus-background-color-plussCss" href="#carousel-example-generic" data-slide="prev">
									<span class="icon-prev"></span>
								</a>
								<a class="right carousel-control color-plus-background-color-plussCss" href="#carousel-example-generic" data-slide="next">
									<span class="icon-next"></span>
								</a>
							</div>
						</div>
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
								<div class="col-lg-5 col-lg-offset-2 col-sm-6">
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
								<a href="/bookings/new?service=3" class="big-button btn-secondary call-to-action btn_SeeAll_fisrt">{{trans ('greetings.Geting Started')}}</a>
								<a href="/services" class="big-button btn-invert-secondary call-to-action btn_SeeAll_second">{{trans ('greetings.See All Services')}}</a>
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