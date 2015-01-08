@extends('layouts.default')
@section('content')
<style>
	.text-login {
		color: #53A524;
	}
	.floating-label {
		font-size: 200%;
		color: red;
	}
</style>	
<div class="main-body-container">
<div class="login-background" style="background-image: url({{ asset('home_page/img/Wood_Wallpaper_by_stenosis.jpg') }});">
<div class="row">
<form accept-charset="UTF-8" action="#" class="simple_form analytics-event" data-event-name="regular email log in attempt" id="new_user_session" method="post">
	<div class="login-block" >
		<p class="larger center" style = "color: #53A524">Log in</p>
		<div class="form-fields-wrapper" style = " max-width: 25em">
			<div class="pad-top">
				<div class="form-control-wrapper" style = "margin-bottom: 10%;" >
					<input style = "color: #009587; font-size: 110%;	margin-bottom: 5%;" type="email" class="form-control empty" data-hint="A valid email should contains @" required><div class="hint">A valid email should contains @</div>
					<div class="floating-label" style = "color: #53A524;">Email</div>
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
			<style>
				#btn-submit {
					background-color: #8cc63f; 
					border: 1px solid #8cc63f; 
					color: #fff;
				}
				#btn-submit:hover {
					background-color: #53A524; 
					border: 1px solid #53A524; 
					color: #fff;
				}
			</style>
			<input class="button btn-full push-top btn-primary" name="commit" type="submit" value="Log in" id = "btn-submit" id = "btn-submit">
		</div>
		<div class="pad-top2">
			<div class="or-line">
				<span class="or-text">or</span>
			</div>
		</div>
		<div class="form-fields-wrapper">
			<style>
				#btn-facebook {
					background-color: #3b5998;
					border: 1px solid #3b5998;
					color: #fff;
				}
				#btn-facebook:hover {
					background-color: #3867CA;
					border: 1px solid #3867CA;
				}
			</style>
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
@stop