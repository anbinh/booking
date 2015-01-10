<header class="page-header" style= "display: inline; ">
  	<div class="row" id ="rowNarbar" >
		<!-- navbar navbar-default -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- navbar-header -->
			<div class="navbar-header" style ="background-color: #2ecc71;">				
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href={{URL::route('landing-page')}}>
	        		LOGO
	      		</a>
			</div><!-- /navbar-header -->
			<!-- navbar -->
			<div class="navbar-collapse collapse" style ="background-color: #2ecc71;">
				<ul class="nav navbar-nav navbar-right" style ="padding-top: 0px; padding-right: 20px;">
					<li><a href=@if(Auth::check()){{URL::to('logout')}}@else {{URL::to('login')}} @endif>@if(Auth::check()){{trans ('greetings.Logout')}}@else {{trans ('greetings.Login')}} @endif</a></li>
					
					@if(!Auth::check()) <li><a href={{URL::to('register')}}>{{trans ('greetings.Register')}}</a></li> @endif
	                <li><a href={{URL::route('about-page')}}> About Us</a></li>
	                 <li><a href={{URL::route('FAQ-page')}}> FAQ</a></li>
	                <li><a href={{URL::route('why-book-page')}}> Why book with us?</a></li>
		            <li class='number-regular nav-link'><a href="tel: 4373457313"><i class='fa fa-phone'></i> 437-345-7313</a></li>
	                <li class="dropdown">
	                 	<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{trans ('greetings.Language')}} <b class="caret"></b><div class="ripple-wrapper"></div></a>
                      	<ul class="dropdown-menu">
                        <li><a href={{URL::route('english-language')}}>{{trans ('greetings.English')}}</a></li>
                        <li><a href={{URL::route('chinese-language')}}>{{trans ('greetings.Chinese')}} </a></li>
                      	</ul>
	                </li>
			</div><!-- /navbar -->				
		</div><!-- /navbar navbar-default -->
	</div>
</header>