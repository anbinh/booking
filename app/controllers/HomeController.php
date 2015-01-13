<?php
/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'lib/Facebook/FacebookSession.php');
	require_once( 'lib/Facebook/FacebookRequest.php' );
	require_once( 'lib/Facebook/FacebookResponse.php' );
	require_once( 'lib/Facebook/FacebookSDKException.php' );
	require_once( 'lib/Facebook/FacebookRequestException.php' );
	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
	require_once( 'lib/Facebook/GraphObject.php' );
	require_once( 'lib/Facebook/GraphUser.php' );
	require_once( 'lib/Facebook/GraphSessionInfo.php' );
	require_once( 'lib/Facebook/Entities/AccessToken.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;



class HomeController extends BaseController {

    public function __construct()
    {

    }

	public function getIndex()
	{
		return View::make('home.index');
	}
	

	public function getLogin()
	{
		if(Auth::check()) {
			return Redirect::to('dashboard');
		}

		return View::make('home.login');
	}

	public function postLogin()
	{	
		
		$input = Input::all();

		$rules = array('email' => 'required', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{

			return Redirect::route('login-page')->withErrors($v);

		} else { 

			$credentials = array('email' => $input['email'], 'password' => $input['password'], 'confirmation' => '');

			$remember_me = (isset($input['remember_me'])) ? true : false;

			if(Auth::attempt($credentials, $remember_me))
			{
				if(Auth::user()->role == '1') {
					return Redirect::route('admin-page');
				}
				else {
					return Redirect::route('landing-page');
				}

			} else {

				return Redirect::route('login-page')->with("success", "0");
			}
		}
	}

	public function getRegister()
	{
		if(Auth::check()) {
			return Redirect::to('dashboard');
		}	
		return View::make('home.register');
	}

	public function postRegister()
	{
		if(Auth::check()) {
			return Redirect::route('landing-page');
		}	
		
		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required|confirmed');

		$v = Validator::make($input, $rules);

		//GENERATE $newcode - RANDOM STRING TO VERIFY SIGNUP
		for($code_length = 25, $newcode = ''; strlen($newcode) < $code_length; $newcode .= chr(!rand(0, 2) ? rand(48, 57) : (!rand(0, 1) ? rand(65, 90) : rand(97, 122))));

		if($v->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->confirmation = $newcode;
			$user->save();

			//Send confirmation email
		    $data = array(
		        'email'     => $input['email'],
		        'clickUrl'  => URL::to('/') . '/confirm/' . $newcode
		    );
		   
		    //---new send email----//
		    try {
		    	Mail::send('emails.signup', $data, function($message)
		    	{
		    		$message->to(Input::get('email'))->subject('Welcome');
		    	});
		    
		    }
		    catch (Exception $e){
		    	$to      = Input::get('email');
		    	$subject = 'Welcome';
		    	$message = View::make('emails.signup', $data)->render();
		    	$headers = 'From: admin@homeez.com' . "\r\n" .
		    			'Reply-To: admin@homeez.com' . "\r\n" .
		    			'X-Mailer: PHP/' . phpversion() . "\r\n" .
		    			'MIME-Version: 1.0' . "\r\n" .
		    			'Content-Type: text/html; charset=ISO-8859-1\r\n';
		    
		    	mail($to, $subject, $message, $headers);
		    		
		    }
		    //redirect to confirmation alert
			return Redirect::route('login-page')->with("emailfirst", "1");

		} else {

			return Redirect::route('register-page')->withInput()->withErrors($v);

		}
	}

	public function confirm( $id_code )
	{

	    if ( $user_info = User::where('confirmation', '=', $id_code)->first() )
	    {

	        $uid    = $user_info->id;
	        $email  = $user_info->email;

	        $data = array(
	            'confirmation'   => $id_code,
	            'user_id'   => $uid,
	            'email'     => $email
	        );

	        $user   = User::find($uid);
	        $user->confirmation = '';
	        $user->save();

	        Auth::login( User::find($uid) );

	        return Redirect::route('login-page')->with("confirmed", "1");

	    } else {

	        return Redirect::route('login-page')->with("confirmed", "0");

	    }

	}

	public function getForgetpass() {
		return View::make('home.forgetpass');
	}

	
	public function postForgetpass() {
		$input = Input::all();

		$rules = array('email' => 'required|email|exists:users,email');

		$v = Validator::make($input, $rules);

		//GENERATE $newcode - RANDOM STRING TO VERIFY SIGNUP
		for($code_length = 25, $newcode = ''; strlen($newcode) < $code_length; $newcode .= chr(!rand(0, 2) ? rand(48, 57) : (!rand(0, 1) ? rand(65, 90) : rand(97, 122))));

		if($v->passes())
		{

	        $user   = User::where('email', '=', $input['email'])->first();
			$user->pass_reset = $newcode;
			$user->save();

			//Send confirmation email
		    $data = array(
		        'email'     => $input['email'],
		        'clickUrl'  => URL::to('/') . '/changepass/' . $newcode
		    );
		    
		  
			//---new send email----//
		    try {
		    	Mail::send('emails.changepass', $data, function($message)
		    	{
		    		$message->to(Input::get('email'))->subject('Change password');
		    	});
		    
		    }
		    catch (Exception $e){
		    	$to      = Input::get('email');
				$subject = 'Change password';
				$message = View::make('emails.changepass', $data)->render();
		    	$headers = 'From: admin@homeez.com' . "\r\n" .
		    			'Reply-To: admin@homeez.com' . "\r\n" .
		    			'X-Mailer: PHP/' . phpversion() . "\r\n" .
		    			'MIME-Version: 1.0' . "\r\n" .
		    			'Content-Type: text/html; charset=ISO-8859-1\r\n';
				
				mail($to, $subject, $message, $headers);
			
		    }
		    //redirect to changepass alert
			return Redirect::route('restore-page')->withErrors($v)->with("changepass", "0");

		} else {

			return Redirect::route('restore-page')->withErrors($v);

		}
	}

	public function changepass( $id_code )
	{

	    if ( $user = User::where('pass_reset', '=', $id_code)->first() )
	    {
	    	for($code_length = 11, $newcode = ''; strlen($newcode) < $code_length; $newcode .= chr(!rand(0, 2) ? rand(48, 57) : (!rand(0, 1) ? rand(65, 90) : rand(97, 122))));
	        
	        $data = array(
	        	'email'		=> $user->email,
	            'username'  => $user->username,
	            'password'	=> $newcode
	        );

	        $user->pass_reset = '';
	        $user->password = Hash::make($newcode);
	        $user->save();

		    
		    //---new send email----//
		    try {
		    	Mail::send('emails.newpass', $data, function($message) use ($data)
			    {
			        $message->to($data['email'])->subject('Your new password');
			    });
		    
		    }
		    catch (Exception $e){
		    	$to      = $data['email'];
		    	$subject = 'Your new password';
		    	$message = View::make('emails.newpass', $data)->render();
		    	$headers = 'From: admin@homeez.com' . "\r\n" .
		    			'Reply-To: admin@homeez.com' . "\r\n" .
		    			'X-Mailer: PHP/' . phpversion() . "\r\n" .
		    			'MIME-Version: 1.0' . "\r\n" .
		    			'Content-Type: text/html; charset=ISO-8859-1\r\n';
		    
		    	mail($to, $subject, $message, $headers);
		    
		    }
		    
	        return Redirect::to('login')->with("changepass", "1");

	    } else {

	        return Redirect::to('/');

	    }

	}

	public function logout()
	{
		Auth::logout();
		Session::put('facebook-login-session', false);
		return Redirect::route('login-page');
	}

	public function getPassrequest() {
		$user = Auth::user();

		if($user) {
	    	for($code_length = 11, $newcode = ''; strlen($newcode) < $code_length; $newcode .= chr(!rand(0, 2) ? rand(48, 57) : (!rand(0, 1) ? rand(65, 90) : rand(97, 122))));
	        
	        $user   = User::where('email', '=', $user->email)->first();
			$user->pass_reset = $newcode;
			$user->save();

			//Send confirmation email
		    $data = array(
		        'email'     => $user->email,
		        'clickUrl'  => URL::to('/') . '/dashboard/profile/passchange/' . $newcode
		    );
		    
		  
		    
		    try {
		    	  Mail::send('emails.changepassrequest', $data, function($message) use ($user){
			         $message->to($user->email)->subject('Change password');
				  });
		    } catch (Exception $e){
		    	$to      = $data['email'];
		    	$subject = 'Change password';
		    	$message = View::make('emails.changepassrequest', $data)->render();
		    	$headers = 'From: admin@homeez.com' . "\r\n" .
		    			'Reply-To: admin@homeez.com' . "\r\n" .
		    			'X-Mailer: PHP/' . phpversion() . "\r\n" .
		    			'MIME-Version: 1.0' . "\r\n" .
		    			'Content-Type: text/html; charset=ISO-8859-1\r\n';
		    
		    	mail($to, $subject, $message, $headers);
		    
		    }

	        return Redirect::back()->with("changepassrequest", "1");
		}	
		else {
			return Redirect::to('/');
		}
	}

	public function getPassChange() {
		return View::make('home.changepass');
	}

	public function postPassChange($id_code) {
		$input = Input::all();

		$rules = array('password' => 'required|confirmed');

		$v = Validator::make($input, $rules);

		if($v->passes()) {
			$user = User::where('pass_reset', '=', $id_code)->first();
			$user->password = Hash::make($input['password']);
			$user->pass_reset = "";
			$user->save();
			return Redirect::to('dashboard');
		}
		return Redirect::back()->withErrors($v);

	}	

	public function get404() {
		return View::make('home.filenotfound');
	}

	public function getUser($user_id)
	{
		if(!is_numeric($user_id) || $user_id == "") {
			return Redirect::to('/filenotfound');
		}

		$user = User::where('id', '=', $user_id)->first();
		
		if(!$user) {
			return Redirect::to('/filenotfound');
		}

		return View::make('home.user')->with("user", $user);
	}
	
	public function loginfacebook()
	{	
		$app_id = '795327690540365';
		$app_secret = '988eaa891818273370656bcbc0a5b134';
		$redirect_url='http://'.$_SERVER['HTTP_HOST'].'/login-facebook';
		
		//3.Initialize application, create helper object and get fb sess
		FacebookSession::setDefaultApplication($app_id,$app_secret);
		$helper = new FacebookRedirectLoginHelper($redirect_url);
		$sess = $helper->getSessionFromRedirect();
		//4. if fb sess exists echo name
		if(isset($sess)){
			//create request object,execute and capture response
			$request = new FacebookRequest($sess, 'GET', '/me');
			// from response get graph object
			$response = $request->execute();
			$graph = $response->getGraphObject(GraphUser::className());
			// use graph object methods to get user details
			$ID= $graph->getId();//facebook ID
			$email= $graph->getEmail();
			$email = $email==""?"somthing@example.com":$email;
			$username = $graph->getName();
			Session::put('facebook-login-session', true);
			$v = Validator::make(
				array('uid' => $ID),
				array('uid' => 'required|unique:users')
			);
			
			if($v->passes()) {
				
				$user = new User();
				$user->username = $username;
				$user->email = $email;
				$user->uid = $ID;
				$user->save();
				
				
			}
			return Redirect::route('landing-page');
		}else{
			return Redirect::to($helper->getLoginUrl());
			//return Redirect::route('login-page');
		//else echo login
		//echo $helper->getLoginUrl(); die;
		//echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
		}
		/*$app_id = '1568122293417956';
		$app_secret = 'e5cf555ff6df8f9514ded64fb8ee4bec';
		$redirect_url='http://localhost/Project2/booking/public/login-facebook';//fix later

		FacebookSession::setDefaultApplication($app_id,$app_secret);
		$helper = new FacebookRedirectLoginHelper($redirect_url);
		$sess = $helper->getSessionFromRedirect();
		//4. if fb sess exists echo name
		if(isset($sess)) {
			//create request object,execute and capture response
			$request = new FacebookRequest($sess, 'GET', '/me');
			// from response get graph object
			$response = $request->execute();
			$graph = $response->getGraphObject(GraphUser::className());
			// use graph object methods to get user details
			$ID= $graph->getId();//facebook ID
			$email= $graph->getEmail();
			$username = $graph->getName();
			
			
			$v = Validator::make(
				array('uid' => $ID),
				array('uid' => 'required|unique:users')
			);
			
			
			if($v->passes()) {
				$user = new User();
				$user->username = $username;
				$user->email = $email;
				$user->uid = $ID;
				$user->save();
				return Redirect::route('landing-page');
			} else {
				//echo "exist";
			}
		} else {
			return Redirect::route('login-page');
		}

			
		Session::put('facebook-login-session', true);*/
		
		
	
	}
	
	
	
	
	

}
