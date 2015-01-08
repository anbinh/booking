@extends('layouts.default')
@section('content')
	<style>
		.bigtext {
			font-size: 120%;
		}
	</style>
  <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./Demo - Simple parallax scrolling tutorial_files/7r8gQb8MIqE.html" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=580445718641008";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
       	
       	<div id="preload">
	       	<img src="{{ asset('home_page/img/bcg_slide-1.jpg') }}">
	       	<img src="{{ asset('home_page/img/bcg_slide-2.jpg') }}">
	       	<img src="{{ asset('home_page/img/bcg_slide-3.jpg') }}">
	       	<img src="{{ asset('home_page/img/bcg_slide-4.jpg') }}">
       	</div>
       	
       	
       	
		
       	<main>
       	 
	        <section id="slide-1" class="homeSlide" style = "height: 100%" >
	        	<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1" style="background-position: 50% 0px;">
		        	<div class="hsContainer">
			    		
				    		
				    		<!-- /Grab the id for home_cleaning service -->
							
							<div class='overlay'></div>
							
							<div class='main-page-header'>
							<h1 class='hero-text'>
							<p><span>{{trans ('greetings.Welcome to the Green world')}}</p>
							</h1>
							<div class='hero-support-text'>
							<p>{{trans ('greetings.Book expert home cleaners')}}</p> 
								
							<p>{{trans ('greetings.Just pick a time and we will do the rest.')}}</p>
							</div>
							<div class='small-12 columns hero-button-group'>
							<style>
								.btn_SeeAll_fisrt {
									background-color:#53A524;
									border: 1px solid #FFFFFF;
								}
								.btn_SeeAll_fisrt:hover {
									background-color: rgba(255, 255, 255, 0);
									border-color: #FFFFFF;
									color: #FFFFFF;
								}
								
							</style>
							<a href="/bookings/new?service=3" class="big-button btn-secondary block-and-center call-to-action btn_SeeAll_fisrt">{{trans ('greetings.Book a Cleaning')}}</a>
							<style>	
								
								.btn_SeeAll_second {
									color: #53A524;
									background-color: #FFFFFF;
									
								}
								.btn_SeeAll_second:hover {
									color: #FFFFFF;
									background-color: rgba(255, 255, 255, 0);
									border-color: #FFFFFF;
								}
								
							</style>
							<a href="/services" class="big-button btn-alternate push-top block-and-center call-to-action btn_SeeAll_second" >{{trans ('greetings.See All Services')}}</a>
							</div>
							
							
							

							<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}" style="display: none;"></div>
				    		
			    		</div>
		        	</div>
	        	</div>
		    </section>
		    
		    <section id="slide-2" >
		    	<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-2" style="background-position: 50% 0px;">
			    	<div class="hsContainer" style = "background-color: #53A524;">
			    		
					
						
						
							
						<div class="row" style = "margin-top : 5%;text-align: center;">
				            <div class="col-sm-4">
				                <img  style = "margin-left: auto; margin-right: auto;" class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-pros-73787a99cd341166306ff1e8af032fa8.png" alt="">
				                <h3>{{trans ('greetings.Marketing Box #1')}}</h3>
				                <p>{{trans ('greetings.These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.')}}</p>
				            </div>
				            <div class="col-sm-4">
				                <img style = "margin-left: auto; margin-right: auto;" class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-availability-2723e0d38f0913a153d05b7a5959b93e.png" alt="">
				                <h3>{{trans ('greetings.Marketing Box #2')}}</h3>
				                <p>{{trans ('greetings.These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.')}}</p>
				            </div>
				            <div class="col-sm-4">
				                <img style = "margin-left: auto; margin-right: auto;" class="img-circle img-responsive img-center" src="https://p-handy.hbfiles.com/assets/landing-page/value-stamp-39f73b57011a7d707d028a0a911a79ca.png" alt="">
				                <h3>{{trans ('greetings.Marketing Box #3')}}</h3>
				                <p>{{trans ('greetings.These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.')}}</p>
				            </div>
				        </div>
				        
				       
				        
			    		
		        	</div>
		    	</div>
		    </section>
		    
			<section id="slide-3" class="" >
				<div class="bcg skrollable skrollable-before" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-bottom-top="background-position: 50% 100px;" data-anchor-target="#slide-3" style="background-position: 50% 100px;">
			    	
			    	<div class="hsContainer">
		    			
						
						
						<div class='main-content-row-no-padding bottom-line' style = "background-color: none;">
						
							<div class='testimonials-container'>
							<style>
								.quote-left:before {
									color: #53A524;
								}
								.carousel-controller input[type="radio"]:checked {
									background-color: #53A524;
								}
								
							</style>
							<p class='quote-left'></p>
							
							
							
							<div id="carousel-example-generic" class="carousel slide">
		                        <!-- Indicators -->
		                        <ol class="carousel-indicators hidden-xs" style = "bottom: -20%;" style = "color: #0bb8e3;">
		                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active" style = "color: #0bb8e3;"></li>
		                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		                        </ol>
		
		                        <!-- Wrapper for slides -->
		                        <div class="carousel-inner">
		                        <style>
		                        	.quote-left:before {
										color: #FFF;
									}
		                        </style>
		                            <div class="item active">
		                                <div style = "color: #0bb8e3; width:">
		                                	<h3 class='section-block-header push-top' style = "color: #0bb8e3;"><b>{{trans ('greetings.Dont just take our word for it')}}</b></h3>
		                                	<h3><b>{{trans ('greetings.Tried to hang a TV on my own. What a mistake! Handys handymen')}}<br>{{trans ('greetings.professional and left my place spotless!')}}<br>{{trans ('greetings.ANNA, New York')}}</b></h3>
		                                </div>
		                                
		                            </div>
		                            <div class="item">
		                                 <div style = "color: #0bb8e3; width:">
		                                 <h3 class='section-block-header push-top' style = "color: #0bb8e3;"><b>{{trans ('greetings.Dont just take our word for it')}}</b></h3>
		                                	<h3><b>{{trans ('greetings.Tried to hang a TV on my own. What a mistake! Handys handymen')}}<br>{{trans ('greetings.professional and left my place spotless!')}}<br>{{trans ('greetings.ANNA, New York')}}</b></h3>
		                                </div>
		                            </div>
		                            <div class="item">
		                                 <div style = "color: #0bb8e3; width:">
		                                 <h3 class='section-block-header push-top' style = "color: #0bb8e3;"><b>{{trans ('greetings.Dont just take our word for it')}}</b></h3>
		                                	<h3><b>{{trans ('greetings.Tried to hang a TV on my own. What a mistake! Handys handymen')}}<br>{{trans ('greetings.professional and left my place spotless!')}}<br>{{trans ('greetings.ANNA, New York')}}</b></h3>
		                                </div>
		                            </div>
		                        </div>
		
		                        <!-- Controls -->
		                        <style>
		                        	.carousel-control {
		                        		border-radius: 100%;
		                        		width: 30px;
		                        		height: 30px;
		                        		margin-top: 7%;
		                        	}
		                        </style>
		                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev" style = "color: #FFF; background-color: #53A524;">
		                            <span class="icon-prev"></span>
		                        </a>
		                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next" style = "color: #FFF; background-color: #53A524;">
		                            <span class="icon-next"></span>
		                        </a>
		                    </div>
                    
							</div>
			    		
			    		
						
						
						<div class='main-content-row bottom-line' style = "opacity: 5; background-color: white;">
							
							
							<div class="row">
				                <div class="col-lg-5 col-sm-6">
				                    <hr class="section-heading-spacer">
				                    <div class="clearfix"></div>
				                    <p style = "color: #53A524" class='home-download-app-header' style = "color: #53A524" >{{trans ('greetings.Handy on the go')}}</p>
									<p class = "bigtext" style = "color: #53A524;">{{trans ('greetings.Conveniently book and manage Handy appointments.')}} <a href="https://itunes.apple.com/app/handybook-book-trusted-home/id604419063?mt=8">{{trans ('greetings.Download the free Handy app')}}</a> {{trans ('greetings.for your iPhone.')}}</p>
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
						<h3 class='section-block-header pad-top' style = "color: white;">{{trans ('greetings.Ready to start?')}}</h3>
						</div>
						<div class='small-12 columns two-button-row' style='padding-bottom: 3em'>
						<a href="/bookings/new?service=3" class="big-button btn-secondary call-to-action btn_SeeAll_fisrt">{{trans ('greetings.Geting Started')}}</a>
						<a href="/services" class="big-button btn-invert-secondary call-to-action btn_SeeAll_second">{{trans ('greetings.See All Services')}}</a>
						</div>
						</div>
			    	</div>
			    	
			    </div>
			</section>
			
			
		    
		</main>

        <script src="{{ asset('home_page/js/jquery.min.js') }}"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="{{ asset('home_page/js/imagesloaded.js') }}"></script>
        <script src="{{ asset('home_page/js/skrollr.js') }}"></script>
        <script src="{{ asset('home_page/js/_main.js') }}"></script>
        
        <!-- Google Analytics: change UA-839919-3 to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-839919-3'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
@stop