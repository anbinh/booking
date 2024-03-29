<?php



class HomeController extends BaseController {

	public $nationals = array(
		'Afghan',
		'Albanian',
		'Algerian',
		'American',
		'Andorran',
		'Angolan',
		'Antiguans',
		'Argentinean',
		'Armenian',
		'Australian',
		'Austrian',
		'Azerbaijani',
		'Bahamian',
		'Bahraini',
		'Bangladeshi',
		'Barbadian',
		'Barbudans',
		'Batswana',
		'Belarusian',
		'Belgian',
		'Belizean',
		'Beninese',
		'Bhutanese',
		'Bolivian',
		'Bosnian',
		'Brazilian',
		'British',
		'Bruneian',
		'Bulgarian',
		'Burkinabe',
		'Burmese',
		'Burundian',
		'Cambodian',
		'Cameroonian',
		'Canadian',
		'Cape Verdean',
		'Central African',
		'Chadian',
		'Chilean',
		'Chinese',
		'Colombian',
		'Comoran',
		'Congolese',
		'Costa Rican',
		'Croatian',
		'Cuban',
		'Cypriot',
		'Czech',
		'Danish',
		'Djibouti',
		'Dominican',
		'Dutch',
		'East Timorese',
		'Ecuadorean',
		'Egyptian',
		'Emirian',
		'Equatorial Guinean',
		'Eritrean',
		'Estonian',
		'Ethiopian',
		'Fijian',
		'Filipino',
		'Finnish',
		'French',
		'Gabonese',
		'Gambian',
		'Georgian',
		'German',
		'Ghanaian',
		'Greek',
		'Grenadian',
		'Guatemalan',
		'Guinea-Bissauan',
		'Guinean',
		'Guyanese',
		'Haitian',
		'Herzegovinian',
		'Honduran',
		'Hungarian',
		'I-Kiribati',
		'Icelander',
		'Indian',
		'Indonesian',
		'Iranian',
		'Iraqi',
		'Irish',
		'Israeli',
		'Italian',
		'Ivorian',
		'Jamaican',
		'Japanese',
		'Jordanian',
		'Kazakhstani',
		'Kenyan',
		'Kittian and Nevisian',
		'Kuwaiti',
		'Kyrgyz',
		'Laotian',
		'Latvian',
		'Lebanese',
		'Liberian',
		'Libyan',
		'Liechtensteiner',
		'Lithuanian',
		'Luxembourger',
		'Macedonian',
		'Malagasy',
		'Malawian',
		'Malaysian',
		'Maldivan',
		'Malian',
		'Maltese',
		'Marshallese',
		'Mauritanian',
		'Mauritian',
		'Mexican',
		'Micronesian',
		'Moldovan',
		'Monacan',
		'Mongolian',
		'Moroccan',
		'Mosotho',
		'Motswana',
		'Mozambican',
		'Namibian',
		'Nauruan',
		'Nepalese',
		'New Zealander',
		'Nicaraguan',
		'Nigerian',
		'Nigerien',
		'North Korean',
		'Northern Irish',
		'Norwegian',
		'Omani',
		'Pakistani',
		'Palauan',
		'Panamanian',
		'Papua New Guinean',
		'Paraguayan',
		'Peruvian',
		'Polish',
		'Portuguese',
		'Qatari',
		'Romanian',
		'Russian',
		'Rwandan',
		'Saint Lucian',
		'Salvadoran',
		'Samoan',
		'San Marinese',
		'Sao Tomean',
		'Saudi',
		'Scottish',
		'Senegalese',
		'Serbian',
		'Seychellois',
		'Sierra Leonean',
		'Singaporean',
		'Slovakian',
		'Slovenian',
		'Solomon Islander',
		'Somali',
		'South African',
		'South Korean',
		'Spanish',
		'Sri Lankan',
		'Sudanese',
		'Surinamer',
		'Swazi',
		'Swedish',
		'Swiss',
		'Syrian',
		'Taiwanese',
		'Tajik',
		'Tanzanian',
		'Thai',
		'Togolese',
		'Tongan',
		'Trinidadian/Tobagonian',
		'Tunisian',
		'Turkish',
		'Tuvaluan',
		'Ugandan',
		'Ukrainian',
		'Uruguayan',
		'Uzbekistani',
		'Venezuelan',
		'Vietnamese',
		'Welsh',
		'Yemenite',
		'Zambian',
		'Zimbabwean'
	);

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
			$credentials = array('email' => $input['email'], 'password' => $input['password']);
			$remember_me = (isset($input['remember_me'])) ? true : false;
			if(Auth::attempt($credentials, $remember_me))
			{
				if(isset($input['returnURL'])){
					return Redirect::to($input['returnURL']);
				}

				if(Auth::user()->role == '1') {
					return Redirect::route('admin-page');
				}
				else {
					if (Auth::user()->role == '2') {
						return Redirect::route('supplier-page');
					} else {
						return Redirect::route('landing-page');
					}
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


//		var_dump($input);
//		die();

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
			$user->area = isset($input['area']) ? $input['area'] : "";
			$user->city = isset($input['city']) ? $input['city'] : "";
			$user->phone_number = isset($input['phone_number'])? $input['phone_number'] : "";
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

			$credentials = array('email' => $input['email'], 'password' => $input['password']);
			$remember_me = (isset($input['remember_me'])) ? true : false;
			if(Auth::attempt($credentials, $remember_me)){
				if(isset($input['returnURL'])){
					return Redirect::to($input['returnURL']);
				}
				return Redirect::route('login-page')->with("emailfirst", "1");
			}
		    //redirect to confirmation alert
		} else {
			return Redirect::route('register-page')->withInput()->withErrors($v);
		}
	}
	
	public function postRegisterSupplier()
	{
		if(Auth::check()) {
			return Redirect::route('admin-page');
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
			$role = 2; 
			
			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->phone_number = $input['phone_number'];
			$user->area = $input['area'];
			$user->city = $input['city'];
			$user->confirmation = $newcode;
			$user->role = $role;
			$user->save();
	
			//Send confirmation email
			$data = array (
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
			return Redirect::route('login-supplier-page')->with("emailfirst", "1");
	
		} else {
	
			return Redirect::route('register-supplier-page')->withInput()->withErrors($v);
	
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
		SupplierController::removeFilterSession();
		$fauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
		$fauth->logoutAllProviders();
		$fauth = new Hybrid_Auth(app_path().'/config/google_auth.php');
		$fauth->logoutAllProviders();
		$fauth = new Hybrid_Auth(app_path().'/config/twitterAuth.php');
		$fauth->logoutAllProviders();

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
	
	public function postTask()
	{	
		return View::make('pages.home');
	
	}

	public function searchSuppliers()
	{
		return View::make('pages.search');
	}



    public function apiPostFeedback(){

		if (Request::isMethod('post')){

		}
        $inputs = Input::all();
        $result = array(
            'error' =>false
        );
        if(Input::has('rating_star')){
            $rating_star = $inputs['rating_star'];
        } else {
            $result['error'] = true;
            $result['message'] = 'missing rating star';
        }
        if(Input::has('title')){
            $title = $inputs['title'];
        } else {
            $result['error'] = true;
            $result['message'] = 'missing title';
        }
        if(Input::has('content')){
            $content = $inputs['content'];
        } else {
            $result['error'] = true;
            $result['message'] = 'missing content';
        }
        if(!$result['error']){
            $result['error'] = Review::addReview(-1,$rating_star,$title,$content);
        }
        return Response::json($result,200);
    }

	public function cancelBooking($id){
		$task = Task::find($id);

		if($task){
			$task->status = -2;
			$task->save();
		}
		return Response::json(['success' => true],200);
	}

	public function postFeedback(){
		$message = "";
		if (Request::isMethod('post')){
			$inputs = Input::all();
			$result = array(
				'error' =>false
			);
			if(Input::has('rating_star')){
				$rating_star = $inputs['rating_star'];
			} else {
				$result['error'] = true;
				$result['message'] = 'missing rating star';
			}
			if(Input::has('title')){
				$title = $inputs['title'];
			} else {
				$result['error'] = true;
				$result['message'] = 'missing title';
			}
			if(Input::has('content')){
				$content = $inputs['content'];
			} else {
				$result['error'] = true;
				$result['message'] = 'missing content';
			}
			if(!$result['error']){
				$result['error'] = Review::addReview(102,$rating_star,$title,$content);
			}
		}
		return View::make('pages.user-feedback',[
			'message' => $result,
		]);
	}

	/*
	 * move from dashboard controller
	 */

	public function updateProfile(){
		$user = Auth::user();
		if (Request::isMethod('post'))
		{
			$input = Input::all();
			$username = $input['name'];
			$sex = $input['sex'];
			$nation = $input['nation'];
			$current = $input['currentPassword'];
			$newPassword = $input['newPassword'];
			$confirmPassword = $input['confirmPassword'];
			$phoneNumber = $input['phoneNumber'];
			$addr1 = $input['address1'];
			$addr2 = $input['address2'];
			$city = $input['city'];
			$area = $input['area'];
			$user = $this->updateUserInfor(Auth::user()->id, $username, $sex, $nation, $current,
				$newPassword, $confirmPassword, $phoneNumber, $addr1, $addr2, $city, $area);
		}
		return View::make('pages.user-profile',[
			'nationals' => $this->nationals,
			'user' => $user,
		]);
	}

	public function managerBooking(){
		$task = $this->getCurrentBooking(Auth::user()->id);
		return View::make('pages.user-current-booking',[
			'tasks' => $task,
			'hidden' => false
		]);
	}



	private function updateUserInfor($user_id, $username, $user_sex, $user_nation,
									 $oldPass, $newPass, $newPass2, $phone, $addr1, $addr2, $city, $area){
		$user = User::find($user_id);
		if(!$user)
			return null;

		$user->username = $username;
		$user->sex = $user_sex;
		$user->nation = $user_nation;

		$user->phone_number = $phone;
		$user->city = $city;
		$user->area = $area;
		$user->addr1 = $addr1;
		$user->addr2 = $addr2;
		if(strlen($newPass) > 0 && strlen($oldPass) > 0 && $newPass == $newPass2 && Hash::check($oldPass, $user->password)){
			$user->password = $newPass;
		}
		$user->save();
		return $user;
	}

	public function pastBooking(){
		$task = $this->getPastBooking(Auth::user()->id);
		return View::make('pages.user-current-booking',[
			'tasks' => $task,
			'hidden' => true
		]);
	}


	public function apiGetCurrentBooking($user_id){
		$all_booking = $this->getCurrentBooking($user_id);
		return Response::json(array('booking' => $all_booking, 'total' => count($all_booking), 'response' => 200));
	}

	public function apiGetOldBooking($user_id){
		$all_booking = $this->apiGetOldBooking($user_id);
		return Response::json(array('booking' => $all_booking, 'total' => count($all_booking), 'response' => 200));
	}


	protected function getCurrentBooking($user_id)
	{
		$query = DB::table(Task::$table_name);
		$query->leftJoin('service', 'task.service_id', '=', 'service.id')
			->leftJoin('supplier', 'task.supplier_id', '=', 'supplier.id');
		$query->where('task.user_id', '=', $user_id);
		$query->where('task.date', '>', date("Y-m-d H:i:s"))
		->where('task.status', '>', -1);
		$query->orderBy('task.date', 'asc')
		->select('task.id', 'service.name', 'supplier.company_name', 'task.date', 'task.starting_time', 'task.payment_type', 'task.note', 'task.duration')
			->get();;

		$task = $query->get();
		return $task;
	}

	protected function getPastBooking($user_id)
	{
		$query = DB::table(Task::$table_name);
		return $query
			->leftJoin('service', 'task.service_id', '=', 'service.id')
			->leftJoin('supplier', 'task.supplier_id', '=', 'supplier.id')
			->where('task.user_id', '=', $user_id)
			->where(function($query){
				$query->where('task.date', '<', date("Y-m-d H:i:s"))
					->orwhere('task.status', '<', 0);
			})
			->select('task.id', 'service.name', 'supplier.company_name', 'task.date', 'task.starting_time', 'task.payment_type', 'task.note', 'task.duration')
			->orderBy('task.date', 'asc')->get();
	}
}