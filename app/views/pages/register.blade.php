@extends('layouts.default')
@section('content')	

<div class="main-body-container">
<div class="login-background" style="background-image: url({{ asset('home_page/img/Wood_Wallpaper_by_stenosis.jpg') }});">
<div class="row">
<form accept-charset="UTF-8" action="{{URL::to('register')}}" class="simple_form analytics-event" data-event-name="regular email log in attempt" id="new_user_session" method="post">
	<div class="login-block" >
		<p class="larger center color-53A524">Register</p>
		@if($errors->any())
			<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 {{ implode('', $errors->all('<li class="error">:message</li>')) }}
         	</div>

		@endif
		<div class="form-fields-wrapper" id = "form-fields-wrapper-plusCss">
			<div class="pad-top">
				<div class="form-control-wrapper" id = "form-control-wrapper-plusCss" >
					<input name = "username" id = "input-email-plusCss" type="text" class="form-control empty" data-hint="A valid email should contains @" required><div class="hint">A valid email should contains @</div>
					<div class="floating-label" id = "floating-label-plusCss">User name</div>
					<span class="material-input"></span>
				</div>			
			</div>
			<div class="pad-top">
				<div class="form-control-wrapper" id = "form-control-wrapper-plusCss" >
					<input name = "email" id = "input-email-plusCss" type="email" class="form-control empty" data-hint="A valid email should contains @" required><div class="hint">A valid email should contains @</div>
					<div class="floating-label" id = "floating-label-plusCss">Email</div>
					<span class="material-input"></span>
				</div>			
			</div>
			<div class="pad-top">
				<div class="form-control-wrapper">
					<input style = "color: #009587; font-size: 110%;" type="password" id = "input-email-plusCss" class="form-control empty" data-hint="" required name = "password">
					<div class="hint"></div><div class="floating-label" style = "color: #53A524;">Password</div>
					<span class="material-input"></span>
				</div>
			</div>
			<div class="pad-top">
				<div class="form-control-wrapper">
					<input style = "color: #009587; font-size: 110%;" type="password" class="form-control empty" data-hint="" required name = "password_confirmation">
					<div class="hint"></div><div class="floating-label" style = "color: #53A524;">Re-enter Password</div>
					<span class="material-input"></span>
				</div>
			</div>
		</div>
		
		<div class="form-fields-wrapper">
			<div class="form-steps-bottom"></div>
			
			<input class="button btn-full push-top btn-primary" name="commit" type="submit" value="Register" id = "btn-submit" id = "btn-submit">
		</div>
	</div>
</form>
</div>
</div>
</div>
<link rel="stylesheet" href="{{ asset('home_page/css/include-login.css?1') }}">


@stop