@extends('layouts.default')
@section('content')	

<div class="main-body-container">
<div class="login-background" style="background-image: url({{ asset('home_page/img/Wood_Wallpaper_by_stenosis.jpg') }});">
<div class="row">
<form accept-charset="UTF-8" action="#" class="simple_form analytics-event" data-event-name="regular email log in attempt" id="new_user_session" method="post">
	<div class="login-block" >
		<p class="larger center color-53A524">Log in</p>
		<div class="form-fields-wrapper" id = "form-fields-wrapper-plusCss">
			<div class="pad-top">
				<div class="form-control-wrapper" id = "form-control-wrapper-plusCss" >
					<input id = "input-email-plusCss" type="email" class="form-control empty" data-hint="A valid email should contains @" required><div class="hint">A valid email should contains @</div>
					<div class="floating-label" id = "floating-label-plusCss">Email</div>
					<span class="material-input"></span>
				</div>			
			</div>
			<div class="pad-top">
				<div class="form-control-wrapper">
					<input style = "color: #009587; font-size: 110%;" type="password" class="form-control empty" data-hint="" required>
					<div class="hint"></div><div class="floating-label" style = "color: #53A524;">Password</div>
					<span class="material-input"></span>
				</div>
			</div>
		</div>
		<div class="even-smaller center">
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
			
			<a href="" class="no-decoration" data-event-name="facebook log in attempt" onclick="">
				<div class="push-top center btn-default btn-facebook btn-face" id = "btn-facebook" >
					<i class="fa fa-facebook-square"></i>
					Log in with Facebook
				</div>
			</a>
		</div>
	</div>
</form>
</div>
</div>
</div>
<link rel="stylesheet" href="{{ asset('home_page/css/include-login.css') }}">
@stop