<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', 'HomeController@getIndex');
Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');
Route::get('forgetpass', 'HomeController@getForgetpass');
Route::post('forgetpass', 'HomeController@postForgetpass');
Route::get( 'confirm/{id_code}', array( 'uses' => 'HomeController@confirm' ));
Route::get( 'changepass/{id_code}', array( 'uses' => 'HomeController@changepass' ));

//route for profile pass change
Route::get( 'dashboard/profile/passrequest', array( 'uses' => 'HomeController@getPassrequest' ));
Route::get( 'dashboard/profile/passchange/{id_code}', array( 'uses' => 'HomeController@getPassChange' ));
Route::post( 'dashboard/profile/passchange/{id_code}', array( 'uses' => 'HomeController@postPassChange' ));


//route for admin
Route::get('admin', 'AdminController@getIndex');
Route::get('admin/setting', 'AdminController@getSetting');
Route::post('admin/setting', 'AdminController@postSetting');
Route::get('admin/profile', 'AdminController@getProfile');
Route::post('admin/profile', 'AdminController@postProfile');

Route::get('admin/users', 'AdminController@getUsers');
Route::get('admin/users/page/{page}', 'AdminController@getUsers');
Route::get('admin/deluser/{user_id}', 'AdminController@delUser');
Route::get('admin/edituser/{user_id}', 'AdminController@getEditUser');
Route::post('admin/edituser/{user_id}', array('uses' => 'AdminController@postEditUser'));
Route::post('admin/changeuserpass/{user_id}', array('as' => 'admin.changeuserpass', 'uses' => 'AdminController@postChangePass'));
Route::get('admin/adduser', 'AdminController@getAddUser');
Route::post('admin/adduser', 'AdminController@postAddUser');


Route::get('user/{user_id}', array('uses' => 'HomeController@getUser'));


Route::group(array('before' => 'auth'), function(){

	Route::get('dashboard', 'DashboardController@getIndex');
	Route::get('dashboard/profile', 'DashboardController@getProfile');
	Route::post('dashboard/profile', 'DashboardController@postProfile');

});

Route::post('upload/image/{user_id}', array('uses' => 'ImageController@postUpload'));
Route::post('upload/image', array('uses' => 'ImageController@postUpload'));

Route::get('filenotfound', 'HomeController@get404');
*/

//-------------NEW----------------//
Route::filter('check-language', function(){
	if(!Session::has('locale')) {
		Session::set('locale','en');
	}
	Lang::setLocale(Session::get('locale'));

});
Route::group(array('before'=>'check-language'), function(){
	Route::get('/',array('as'=>'landing-page', function()
	{
		return View::make('pages.home');
	}));
	
	
	Route::get('login',array ('as'=>'login-page', function()
	{
		return View::make('pages.login');
	}));
	Route::get('register',array ('as'=>'register-page', function()
	{
		return View::make('pages.register');
	}));
	Route::get('restore',array('as'=>'restore-page', function()
	{
		return View::make('pages.restore');
	}));
	
	Route::get('about',array('as'=>'about-page', function()
	{
		return View::make('pages.aboutUs');
	}));
	Route::get('terms',array ('as'=>'terms-page', function()
	{
		return View::make('pages.termsOfService');
	}));
	Route::get('list-service',array ('as'=>'list-service-page', function()
	{
		return View::make('pages.list-service');
	}));
	Route::get('privacy',array ('as'=>'privacy-page', function()
	{
		return View::make('pages.privacy');
	}));
	Route::get('why-book-with-us',array ('as'=>'why-book-page', function()
	{
		return View::make('pages.whybook');
	}));
	Route::get('contact',array ('as'=>'contact-page', function()
	{
		return View::make('pages.contact');
	}));
	Route::get('FAQ',array ('as'=>'FAQ-page', function()
	{
		return View::make('pages.FAQ');
	}));
	Route::get('logout', 'HomeController@logout');
	Route::get( 'confirm/{id_code}', array( 'uses' => 'HomeController@confirm' ));
	Route::get( 'changepass/{id_code}', array( 'uses' => 'HomeController@changepass' ));
	
});

	Route::get('language/english',array('as'=>'english-language', function()
	{	Session::set('locale','en');
	return Redirect::back();
	}));
	
	Route::get('language/germany',array('as'=>'chinese-language', function()
	{	Session::set('locale','de');
	return Redirect::back();
	}));
	
	Route::post('login','HomeController@postLogin');
	
	Route::post('register', 'HomeController@postRegister');
	
	Route::post('restore', 'HomeController@postForgetpass');
//-----------login---facebook --///
	Route::get('fbauth/{auth?}',array('as' => 'facebookAuth','uses'=>'AuthController@getFacebookLogin'));
	Route::get('twitterAuth/{auth?}',array('as' => 'twitterAuth','uses'=>'AuthController@getTwitterLogin'));
	Route::get('gauth/{auth?}',array('as' => 'googleAuth','uses'=>'AuthController@getGoogleLogin'));