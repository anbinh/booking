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
       	
       
       	
       	
       	
		
       	<main>
       	 
	        <section id="slide-5" class="homeSlide" style = "height: 100%" >
	        	<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-5" style="background-position: 50% 0px;">
		        	<div class="hsContainer">
			    		
				    		
			    		<!-- /Grab the id for home_cleaning service -->
						
						<div class='overlay'></div>
							
						<div class='main-page-header'>
							<h1 class='hero-text'>
							<p>{{trans ('greetings.All About Us')}}</p>
							</h1>
							<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}" style="display: none;"></div>
				    		
			    		</div>
			    		
			    		<div class="content-section-a">
					
					        <div class="container">
					            <div class="row">
					            	<h3><b>About Us</b></h3>
									<h4 style = "font-size: 110%;">Handy is the leading platform for connecting individuals looking for household services with top-quality, pre-screened independent service professionals.<h4>
					            	<h3><b>Our Story</b></h3>
					            	<h4 style = "font-size: 110%;">Handy, formerly known as Handybook, was founded in 2011 as a practical solution to an age-old problem: finding trusted, effective professionals for common household services. </h4>
					            </div>
					
					        </div>
					        <!-- /.container -->
					
					    </div>
					    
		        	</div>
	        	</div>
		    </section>
		    
		    
			<div class="content-section-a" style = "background-color: #FFF;">
		
		        <div class="container">
		            <div class="row" style = "margin-top: 4%; margin-bottom: 4%;">
		                <div class="col-lg-5 col-sm-6">
		                    <hr class="section-heading-spacer">
		                    <div class="clearfix"></div>
		                    <h2 class="section-heading" style = "color: #53A524">Death to the Stock Photo:<br>Special Thanks</h2>
		                    <p class="lead" style = "color: #53A524">A special thanks to <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a> for providing the photographs that you see in this template. Visit their website to become a member.</p>
		                </div>
		                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
		                    <img class="img-responsive" src="http://ironsummitmedia.github.io/startbootstrap-landing-page/img/ipad.png" alt="">
		                </div>
		            </div>
		
		        </div>
		        <!-- /.container -->
		
		    </div>
		    <!-- /.content-section-a -->
		    <div class="content-section-b" style = "background-color: #53A524;">

		        <div class="container">
		
		            <div class="row" style = "margin-top: 4%; margin-bottom: 4%;">
		                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
		                    <hr class="section-heading-spacer">
		                    <div class="clearfix"></div>
		                    <h2 class="section-heading">3D Device Mockups<br>by PSDCovers</h2>
		                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
		                </div>
		                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
		                    <img class="img-responsive" src="http://ironsummitmedia.github.io/startbootstrap-landing-page/img/dog.png" alt="">
		                </div>
		            </div>
		
		        </div>
		        <!-- /.container -->
		
		    </div>
		    <!-- /.content-section-b -->

			
		    
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