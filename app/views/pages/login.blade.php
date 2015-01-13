@extends('layouts.default')
@section('content')	

<div class="main-body-container">
<div class="login-background" style="background-image: url({{ asset('home_page/img/Wood_Wallpaper_by_stenosis.jpg') }});">
<div class="row">
	<div class = "col-lg-6 col-sm-6">
		<form accept-charset="UTF-8" action="{{URL::to('login')}}" class="simple_form analytics-event" data-event-name="regular email log in attempt" id="new_user_session" method="post">
			<div class="login-block" >
				<p class="larger center color-53A524">Log in</p>
				@if(Session::get("emailfirst") == "1")
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							An email is sent to your email address. please click the link to verify your email account before you can login.
						</div>
						@endif
						@if(Session::get("success") == "0")
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Wrong combination of email/password.
						</div>
						@endif
						@if(Session::get("confirmed") == "1")
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Email Verification success. Now you can login.
						</div>
						@elseif(Session::get("confirmed") == "0")
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Email Verification fail.
						</div>
						@endif
						@if(Session::get("changepass") == "1")
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Please check your email for new password.
						</div>
						@endif
						@if(Session::get("facebook") == "1")
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							There was an error communicating with Facebook.
						</div>
						@endif
						
						@if($errors->any())
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							{{ implode('', $errors->all('<li class="error">:message</li>')) }}
						</div>

						@endif
				<div class="form-fields-wrapper" id = "form-fields-wrapper-plusCss">
					<div class="pad-top">
						<div class="form-control-wrapper" id = "form-control-wrapper-plusCss" >
							<input name = "email" id = "input-email-plusCss" type="email" class="form-control empty" data-hint="A valid email should contains @" required><div class="hint">A valid email should contains @</div>
							<div class="floating-label" id = "floating-label-plusCss">Email</div>
							<span class="material-input"></span>
						</div>			
					</div>
					<div class="pad-top">
						<div class="form-control-wrapper">
							<input style = "color: #009587; font-size: 110%;" type="password" class="form-control empty" data-hint="" required name = "password">
							<div class="hint"></div><div class="floating-label" style = "color: #53A524;">Password</div>
							<span class="material-input"></span>
						</div>
					</div>
				</div>
				<div class="even-medium center">
					
				</div>
				<div class="even-medium center">
					<a href={{URL::route('register-page')}} class="alt-link">Create a new account</a>
				</div>
				<div class="even-medium center">
					<a href={{URL::route('restore-page')}} class="alt-link">Forgot password?</a>
				</div>
				
				
				<div class="form-fields-wrapper">
					<div class="form-steps-bottom"></div>
					
					<input class="button btn-full push-top btn-primary" name="commit" type="submit" value="Log in" id = "btn-submit" id = "btn-submit">
				</div>
				<div class="pad-top2">
					<div class="or-line">
						<span class="or-text">or</span>
					</div>
				</div>
				<div class="form-fields-wrapper">
					
					<a href="./login-facebook" class="no-decoration" data-event-name="facebook log in attempt" onclick="">
						<div class="push-top center btn-default btn-facebook btn-face" id = "btn-facebook" >
							<i class="fa fa-facebook-square"></i>
							Log in with Facebook
						</div>
					</a>
				</div>
			</div>
		</form>
	</div>
	
	<div class = "col-lg-6 col-sm-6" style = "background-higher">
		<div class="login-block" >
				<a href={{URL::route('register-page')}}><p class="larger center color-53A524">Don't have a log-in? <br>Register now</p></a>
				
				<div class="even-medium center">
					<a href={{URL::route('why-book-page')}} class="alt-link">Why register with us?</a>
				</div>
				<div class="even-medium center">
					
				</div>
				
				
				
				
		</div>
	</div>
</div>
</div>
</div>
<link rel="stylesheet" href="{{ asset('home_page/css/include-login.css') }}">


@stop