@extends('layouts.default')
@section('content')	

<div class="main-body-container">
<div class="login-background" style="background-image: url({{ asset('home_page/img/Wood_Wallpaper_by_stenosis.jpg') }});">
<div class="row">
	<div class = ".col-lg-12 col-md-12 col-sm-12 col-xs-12 thumb">
     <h1 style = "text-align: center;">Supplier page (underconstruction)</h1>
		
				
	</div>
	
	<!-- <div class = ".col-lg-6 col-md-6 col-sm-6 col-xs-12 thumb" style = "background-higher">
		<div class="login-block" >
				<a href={{URL::route('register-page')}}><p class="larger center color-53A524">Don't have a log-in? <br>Register now</p></a>
				
				<div class="even-medium center">
					<a href={{URL::route('why-book-page')}} class="alt-link">Why register with us?</a>
				</div>
				<div class="even-medium center">
					
				</div>
				
		
		<ol class="annotation-list">
			  <li>Lorem ipsum dolor sit amet.</li>
			  <li>Lorem ipsum dolor.</li>
			  <li>Lorem ipsum dolor sit amet, consectetur.</li>
			  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
			  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur fuga minus aperiam iste mollitia debitis rem cum eaque.</li>
		</ol>		
				
		</div>
	</div> -->
</div>
</div>
</div>
<style>
	.annotation-list {
	  counter-reset: annotation-list;
	}

	.annotation-list li {
	  position: relative;
	  margin: 0 0 1.5em 0;
	  color: #0BB8E3;
	  /*list-style: none;*/
	}

	.annotation-list li:before {
	  position: absolute;
	  top: -2px;
	  left: -30px;
	  width: 24px;
	  height: 24px;
	  border-radius: 50%;
	  background-color: #f60;

	  content: counter(annotation-list);
	  counter-increment: annotation-list;

	  color: #fff;
	  text-align: center;
	  text-shadow: 0px -1px 0px #888;
	}

</style>		
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900);
  @import url(http://weloveiconfonts.com/api/?family=entypo);

   

#twitter {
  outline: 0 none;
  cursor: pointer;
  position: relative;
  display: inline-block;
  width: 40px;
  height: 40px;
  padding: 0px;
  margin: 22px;
  color: #FFF;
  border: 0 none;
  background-color: rgba(0,172,238,0.8);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 20px rgba(0,172,238,0), inset 0 0 5px #009ad5, 0 1px 1px 1px rgba(255,255,255,0.4);
  -moz-box-shadow: 0 0 0 20px rgba(0,172,238,0), inset 0 0 5px #009ad5, 0 1px 1px 1px rgba(255,255,255,0.4);
  box-shadow: 0 0 0 20px rgba(0,172,238,0), inset 0 0 5px #009ad5, 0 1px 1px 1px rgba(255,255,255,0.4);
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -ms-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
}
#twitter:before {
  content: "\f309";
  color: #FFF;
  font-family: 'entypo', sans-serif;
  font-size: 25px;
  line-height: 45px;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 40px;
  height: 40px;
  text-shadow: 0 0 10px #0087bb;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#twitter:hover,
#twitter:focus {
  background-color: #00acee;
  -webkit-box-shadow: 0 0 0 10px rgba(34,194,255,0.5), inset 0 0 0 0 #00acee, 0 0 5px 2px #003d55;
  -moz-box-shadow: 0 0 0 10px rgba(34,194,255,0.5), inset 0 0 0 0 #00acee, 0 0 5px 2px #003d55;
  box-shadow: 0 0 0 10px rgba(34,194,255,0.5), inset 0 0 0 0 #00acee, 0 0 5px 2px #003d55;
}
#twitter:hover:before,
#twitter:focus:before {
  text-shadow: -1px -1px #0087bb;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
#twitter:active,
#twitter:checked {
  background-color: #009ad5;
  -webkit-box-shadow: 0 0 0 10px rgba(0,154,213,0.5);
  -moz-box-shadow: 0 0 0 10px rgba(0,154,213,0.5);
  box-shadow: 0 0 0 8.3333333333333px rgba(0,154,213,0.5);
  -webkit-box-shadow: 0 0 0 10px rgba(0,154,213,0.5), inset 0 0 0 0 #0087bb;
  -moz-box-shadow: 0 0 0 10px rgba(0,154,213,0.5), inset 0 0 0 0 #0087bb;
  box-shadow: 0 0 0 10px rgba(0,154,213,0.5), inset 0 0 10px #003d55;
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#twitter:active:before,
#twitter:checked:before {
  color: rgba(255,255,255,0.8);
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#facebook {
  outline: 0 none;
  cursor: pointer;
  position: relative;
  display: inline-block;
  width: 40px;
  height: 40px;
  padding: 0px;
  margin: 22px;
  color: #FFF;
  border: 0 none;
  background-color: rgba(59,89,152,0.8);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 20px rgba(59,89,152,0), inset 0 0 5px #344e86, 0 1px 1px 1px rgba(255,255,255,0.4);
  -moz-box-shadow: 0 0 0 20px rgba(59,89,152,0), inset 0 0 5px #344e86, 0 1px 1px 1px rgba(255,255,255,0.4);
  box-shadow: 0 0 0 20px rgba(59,89,152,0), inset 0 0 5px #344e86, 0 1px 1px 1px rgba(255,255,255,0.4);
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -ms-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
}
#facebook:before {
  content: "\f30c";
  color: #FFF;
  font-family: 'entypo', sans-serif;
  font-size: 25px;
  line-height: 45px;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 45px;
  height: 45px;
  text-shadow: 0 0 10px #2d4373;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#facebook:hover,
#facebook:focus {
  background-color: #3b5998;
  -webkit-box-shadow: 0 0 0 10px rgba(76,112,186,0.5), inset 0 0 0 0 #3b5998, 0 0 5px 2px #10182a;
  -moz-box-shadow: 0 0 0 10px rgba(76,112,186,0.5), inset 0 0 0 0 #3b5998, 0 0 5px 2px #10182a;
  box-shadow: 0 0 0 10px rgba(76,112,186,0.5), inset 0 0 0 0 #3b5998, 0 0 5px 2px #10182a;
}
#facebook:hover:before,
#facebook:focus:before {
  text-shadow: -1px -1px #2d4373;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
#facebook:active,
#facebook:checked {
  background-color: #344e86;
  -webkit-box-shadow: 0 0 0 10px rgba(52,78,134,0.5);
  -moz-box-shadow: 0 0 0 10px rgba(52,78,134,0.5);
  box-shadow: 0 0 0 8.3333333333333px rgba(52,78,134,0.5);
  -webkit-box-shadow: 0 0 0 10px rgba(52,78,134,0.5), inset 0 0 0 0 #2d4373;
  -moz-box-shadow: 0 0 0 10px rgba(52,78,134,0.5), inset 0 0 0 0 #2d4373;
  box-shadow: 0 0 0 10px rgba(52,78,134,0.5), inset 0 0 10px #10182a;
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#facebook:active:before,
#facebook:checked:before {
  color: rgba(255,255,255,0.8);
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#instagram {
  outline: 0 none;
  cursor: pointer;
  position: relative;
  display: inline-block;
  width: 70px;
  height: 70px;
  padding: 0px;
  margin: 22px;
  color: #FFF;
  border: 0 none;
  background-color: rgba(63,114,155,0.8);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 20px rgba(63,114,155,0), inset 0 0 5px #386589, 0 1px 1px 1px rgba(255,255,255,0.4);
  -moz-box-shadow: 0 0 0 20px rgba(63,114,155,0), inset 0 0 5px #386589, 0 1px 1px 1px rgba(255,255,255,0.4);
  box-shadow: 0 0 0 20px rgba(63,114,155,0), inset 0 0 5px #386589, 0 1px 1px 1px rgba(255,255,255,0.4);
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -ms-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
}
#instagram:before {
  content: "\f32d";
  color: #FFF;
  font-family: 'entypo', sans-serif;
  font-size: 35px;
  line-height: 70px;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 70px;
  height: 70px;
  text-shadow: 0 0 10px #305777;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#instagram:hover,
#instagram:focus {
  background-color: #3f729b;
  -webkit-box-shadow: 0 0 0 10px rgba(84,140,185,0.5), inset 0 0 0 0 #3f729b, 0 0 5px 2px #13222e;
  -moz-box-shadow: 0 0 0 10px rgba(84,140,185,0.5), inset 0 0 0 0 #3f729b, 0 0 5px 2px #13222e;
  box-shadow: 0 0 0 10px rgba(84,140,185,0.5), inset 0 0 0 0 #3f729b, 0 0 5px 2px #13222e;
}
#instagram:hover:before,
#instagram:focus:before {
  text-shadow: -1px -1px #305777;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
#instagram:active,
#instagram:checked {
  background-color: #386589;
  -webkit-box-shadow: 0 0 0 10px rgba(56,101,137,0.5);
  -moz-box-shadow: 0 0 0 10px rgba(56,101,137,0.5);
  box-shadow: 0 0 0 8.3333333333333px rgba(56,101,137,0.5);
  -webkit-box-shadow: 0 0 0 10px rgba(56,101,137,0.5), inset 0 0 0 0 #305777;
  -moz-box-shadow: 0 0 0 10px rgba(56,101,137,0.5), inset 0 0 0 0 #305777;
  box-shadow: 0 0 0 10px rgba(56,101,137,0.5), inset 0 0 10px #13222e;
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#instagram:active:before,
#instagram:checked:before {
  color: rgba(255,255,255,0.8);
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#googleplus {
  outline: 0 none;
  cursor: pointer;
  position: relative;
  display: inline-block;
  width: 40px;
  height: 40px;
  padding: 0px;
  margin: 22px;
  color: #FFF;
  border: 0 none;
  background-color: rgba(221,75,57,0.8);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 20px rgba(221,75,57,0), inset 0 0 5px #d73925, 0 1px 1px 1px rgba(255,255,255,0.4);
  -moz-box-shadow: 0 0 0 20px rgba(221,75,57,0), inset 0 0 5px #d73925, 0 1px 1px 1px rgba(255,255,255,0.4);
  box-shadow: 0 0 0 20px rgba(221,75,57,0), inset 0 0 5px #d73925, 0 1px 1px 1px rgba(255,255,255,0.4);
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -ms-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
}
#googleplus:before {
  content: "\f30f";
  color: #FFF;
  font-family: 'entypo', sans-serif;
  font-size: 25px;
  line-height: 45px;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 45px;
  height: 45px;
  text-shadow: 0 0 10px #c23321;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#googleplus:hover,
#googleplus:focus {
  background-color: #dd4b39;
  -webkit-box-shadow: 0 0 0 10px rgba(228,115,101,0.5), inset 0 0 0 0 #dd4b39, 0 0 5px 2px #6b1c12;
  -moz-box-shadow: 0 0 0 10px rgba(228,115,101,0.5), inset 0 0 0 0 #dd4b39, 0 0 5px 2px #6b1c12;
  box-shadow: 0 0 0 10px rgba(228,115,101,0.5), inset 0 0 0 0 #dd4b39, 0 0 5px 2px #6b1c12;
}
#googleplus:hover:before,
#googleplus:focus:before {
  text-shadow: -1px -1px #c23321;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
#googleplus:active,
#googleplus:checked {
  background-color: #d73925;
  -webkit-box-shadow: 0 0 0 10px rgba(215,57,37,0.5);
  -moz-box-shadow: 0 0 0 10px rgba(215,57,37,0.5);
  box-shadow: 0 0 0 8.3333333333333px rgba(215,57,37,0.5);
  -webkit-box-shadow: 0 0 0 10px rgba(215,57,37,0.5), inset 0 0 0 0 #c23321;
  -moz-box-shadow: 0 0 0 10px rgba(215,57,37,0.5), inset 0 0 0 0 #c23321;
  box-shadow: 0 0 0 10px rgba(215,57,37,0.5), inset 0 0 10px #6b1c12;
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
#googleplus:active:before,
#googleplus:checked:before {
  color: rgba(255,255,255,0.8);
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -ms-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}

.pen-container {
  position: relative;
  max-width: 680px;
  margin: 0 auto;
  /*padding: 50px 30px;*/
  text-align: center;
  background-color: #FFF;
  -webkit-box-shadow: inset 0 0 20px 20px #F5F7FA;
  -moz-box-shadow: inset 0 0 20px 20px #F5F7FA;
  box-shadow: inset 0 0 20px 20px #FFF;
}
.pen-container:before,
.pen-container:after {
  content: " ";
  position: absolute;
  left: 0px;
  width: 100%;
  /*height: 24px;*/
  background-color: #F5F7FA;
}
.pen-container:before {
  top: 0px;
  -webkit-box-shadow: 0 14px 14px -12px #AAB2BD;
  -moz-box-shadow: 0 14px 14px -12px #AAB2BD;
  box-shadow: 0 14px 14px -12px #AAB2BD;
}
.pen-container:after {
  bottom: 0px;
  -webkit-box-shadow: 0 -14px 14px -12px #AAB2BD;
  -moz-box-shadow: 0 -14px 14px -12px #AAB2BD;
  box-shadow: 0 -14px 14px -12px #AAB2BD;
}

  </style>
<link rel="stylesheet" href="{{ asset('home_page/css/include-login.css?20') }}">


@stop