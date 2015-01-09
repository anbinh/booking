<header class="page-header" style= "display: inline; ">
  	<div class="row" id ="rowNarbar" >
		<!-- navbar navbar-default -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- navbar-header -->
			<div class="navbar-header" style ="background-color: #53A524;">				
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
			<div class="navbar-collapse collapse" style ="background-color: #53A524;">
				<ul class="nav navbar-nav navbar-right" style ="padding-top: 0px; padding-right: 20px;">
					<li><a href={{URL::route('login-page')}}>{{trans ('greetings.Login')}}</a></li>
	                <li><a href={{URL::route('about-page')}}> {{trans ('greetings.Help')}}</a></li>
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