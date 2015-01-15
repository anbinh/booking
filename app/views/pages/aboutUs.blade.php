@extends('layouts.default')
@section('content')
	<main>
		<section id="slide-5" class="homeSlide">
			<div class="bcg skrollable skrollable-between" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-5" id = "skrollable-plusCss">
				<div class="hsContainer">	
					<!-- /Grab the id for home_cleaning service -->
					<div class='overlay'></div>
					<div class='main-page-header' style="margin-top: 5em;">
						<h1 class='hero-text'>
						<p>{{trans ('greetings.All About Us')}}</p>
						</h1>
						<div class="analytics-event-post" data-event-name="zipcode_input_on_homepage" data-event-properties="{&quot;variant_type&quot;:&quot;control&quot;}"></div>	
					</div>	
					<div class="content-section-a">
						<div class="container">
							<div class="row appear-clearly-text">
								<h3><b>About Us</b></h3>
								<h4 class = "big-text-110">Orem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.<h4>
								<h3><b>Our Story</b></h3>
								<h4 class = "big-text-110">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta.</h4>
							</div>
						</div>
						<!-- /.container -->
					</div>	
				</div>
			</div>
		</section>
		
		<div class="content-section-a" id = "content-section-a-plusCss">
			<div class="container">
				<div class="row container-row-plusCss">
					<div class="col-lg-5 col-sm-6">
						<hr class="section-heading-spacer">
						<div class="clearfix"></div>
						<h2 class="section-heading color-53A524">Claritas est etiam:<br>anteposuerit litterarum </h2>
						<p class="lead color-53A524">Claritas est etiam to <a target="_blank" href="http://miratik.com/"> Dest notare quam littera gothica, quam nunc </a> vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
					</div>
					<div class="col-lg-5 col-lg-offset-2 col-sm-6">
						<img class="img-responsive" src="{{ asset('home_page/img/Carpet_Cleaning_Icon.jpg') }}" alt="">
					</div>
				</div>
			</div>
			<!-- /.container -->
		</div>
		<!-- /.content-section-a -->
		<div class="content-section-b" id = "content-section-b-plusCss">
			<div class="container">
				<div class="row container-row-plusCss">
					<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
						<hr class="section-heading-spacer">
						<div class="clearfix"></div>
						<h2 class="section-heading">Uptatum zzril delenit augue <br>dolor in hendrerit </h2>
						<p class="lead">tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam by <a target="_blank" href="http://miratik.com/">Miratik </a></p>
					</div>
					<div class="col-lg-5 col-sm-pull-6  col-sm-6">
						<img class="img-responsive" src="{{ asset('home_page/img/Clean_House.jpg') }}" alt="">
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
 
	<link rel="stylesheet" href="{{ asset('home_page/css/include-about.css') }}">
	<script src="{{ asset('home_page/js/include-about.js') }}"></script>
@stop