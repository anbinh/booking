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
Route::get( 'changepass/{id_code}', array( 'uses' => 'HomeController@changepass' ));*/

//route for profile pass change
Route::get('dashboard/profile/passrequest', array('uses' => 'HomeController@getPassrequest'));
Route::get('dashboard/profile/passchange/{id_code}', array('uses' => 'HomeController@getPassChange'));
Route::post('dashboard/profile/passchange/{id_code}', array('uses' => 'HomeController@postPassChange'));


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


Route::group(array('before' => 'auth'), function () {

    Route::get('dashboard', 'DashboardController@getIndex');
    Route::get('dashboard/profile', 'DashboardController@getProfile');
    Route::post('dashboard/profile', 'DashboardController@postProfile');

});


Route::post('upload/image/{user_id}', array('uses' => 'ImageController@postUpload'));
Route::post('upload/image', array('uses' => 'ImageController@postUpload'));

Route::get('filenotfound', 'HomeController@get404');


//-------------NEW----------------//
Route::filter('check-language', function () {
    if (!Session::has('locale')) {
        Session::set('locale', 'en');
    }
    Lang::setLocale(Session::get('locale'));

    if (!function_exists('cached_asset')) {
        function cached_asset($path, $bustQuery = false)
        {
            // Get the full path to the asset.
            $realPath = public_path($path);

            if (!file_exists($realPath)) {
                throw new LogicException("File not found at [{$realPath}]");
            }

            // Get the last updated timestamp of the file.
            $timestamp = filemtime($realPath);

            if (!$bustQuery) {
                // Get the extension of the file.
                $extension = pathinfo($realPath, PATHINFO_EXTENSION);

                // Strip the extension off of the path.
                $stripped = substr($path, 0, -(strlen($extension) + 1));

                // Put the timestamp between the filename and the extension.
                $path = implode('.', array($stripped, $timestamp, $extension));
            } else {
                // Append the timestamp to the path as a query string.
                $path .= '?' . $timestamp;
            }

            return asset($path);
        }
    }
});

Route::group(array('before' => 'check-language'), function () {
    Route::get('/', array('as' => 'landing-page', function () {
        return View::make('pages.home');
    }));
    Route::post('/', 'HomeController@postTask');


    Route::get('login', array('as' => 'login-page', function () {
        return View::make('pages.login');
    }));

    Route::get('login-supplier', array('as' => 'login-supplier-page', function () {
        return View::make('pages.login-supplier');
    }));

    Route::get('login-admin', array('as' => 'login-admin-page', function () {
        return View::make('pages.login-admin');
    }));

    Route::get('register', array('as' => 'register-page', function () {
        return View::make('pages.register');
    }));

    Route::get('register-supplier', array('as' => 'register-supplier-page', function () {
        return View::make('pages.register-supplier');
    }));

    Route::get('restore', array('as' => 'restore-page', function () {
        return View::make('pages.restore');
    }));

    Route::get('about', array('as' => 'about-page', function () {
        return View::make('pages.aboutUs');
    }));
//	Route::get('suppliers',array('as'=>'suppliers', function()
//	{
//		return View::make('pages.suppliers');
//	}));

    /*
     * make a booking
     */

    Route::post('suppliers', array('uses' => 'SupplierController@postSupplier',
        'as' => 'suppliers-post-search'));

    Route::get('suppliers', array('uses' => 'SupplierController@getSupplier',
        'as' => 'suppliers'));

    Route::get('requestSupplier/{service_id}', array('uses' =>'SupplierController@requestSupplier',
        'as' => 'requestSupplier'));

    Route::post('suppliers-filter', array('uses' => 'SupplierController@postFiltetSupplier',
        'as' => 'suppliers-post-filter'));


//   making a booking Rest API
    Route::get('api/suppliers/{service_id}', array('uses' => 'SupplierController@apigetSupplier',
        'as' => 'api_suppliers'));

    Route::post('api/booking/{id_code}', array('uses' =>'SupplierController@apiCheckoutSupplier','as' => 'api_make_booking'));

    Route::post('api/review',array('uses' => "HomeController@postFeedback", 'as' => 'api_review'));
//	Route::get('suppliers-review/{id_code}',array('as'=>'suppliers-review', function()
//	{
//		return View::make('pages.suppliers-review');
//	}));
    Route::get('suppliers-review/{id_code}', array('uses' => 'SupplierController@reviewSupplier',
        'as' => 'suppliers-review'));

//	Route::get('suppliers-confirm',array('as'=>'suppliers-confirm', function()
//	{
//		return View::make('pages.suppliers-confirm-withoutlogin');
//	}));
//	Route::get('suppliers-confirm-login',array('as'=>'suppliers-confirm-login', function()
//	{
//		return View::make('pages.suppliers-confirm-login');
//	}));

    Route::get('suppliers-confirm/{id_code}', array('uses' => 'SupplierController@confirmSupplier',
        'as' => 'suppliers-confirm'));

//    Route::get('suppliers-confirm/{id_code}', array('uses' => 'SupplierController@finishedSupplier',
//        'as' => 'suppliers-finish'));
//	Route::get('suppliers-checkout-instant',array('as'=>'suppliers-checkout-instant', function()
//	{
//		return View::make('pages.suppliers-checkout-instant');
//	}));
//	Route::get('suppliers-checkout-notinstant',array('as'=>'suppliers-finish-notinstant', function()
//	{
//		return View::make('pages.suppliers-finish-notinstant');
//	}));

    Route::post('suppliers-checkout/{id_code}', array('uses' => 'SupplierController@checkoutSupplier',
        'as' => 'suppliers-checkout'));

    Route::get('suppliers-finish/{id_code}', array('uses' => 'SupplierController@finishedSupplier',
        'as' => 'suppliers-finish'));

    Route::get('suppliers-done/{id_code}', array('as' => 'suppliers-done',
        'uses' => 'SupplierController@doneSupplier'));

//    Route::get('suppliers-calc', array('uses' => 'SupplierController@reCalcSupplierRate',
//        'as' => 'suppliers-calc'));

    /*
     * end a booking
     */

    Route::group(array('before' => 'must-login'), function () {
        /*
         * user pages
         */
        Route::get('dashboard', array('as' => 'user-dashboard', function () {
            return View::make('pages.user-dashboard');
        }));

        Route::get('profile', array('as' => 'user-profile',
            'uses' => 'DashboardController@updateProfile'));

//        Route::get('dashboard.booking', array('as' => 'user-current-booking', function () {
//            return View::make('pages.user-current-booking');
//        }));

        Route::get('dashboard.booking', array('as' => 'user-current-booking',
            'uses' => 'DashboardController@managerBooking'));
        Route::get('dashboard.past.booking', array('as' => 'user-past-booking',
            'uses' => 'DashboardController@pastBooking'));

//        Route::get('past-booking', array('as' => 'user-past-booking', function () {
//            return View::make('pages.user-past-booking');
//        }));

        Route::get('feedback', array('as' => 'user-feedback', function () {
            return View::make('pages.user-feedback');
        }));

        Route::post('purchase', array('as' => 'payment-purchase',
            'uses' => 'PaymentController@purchaseBooking'));
        Route::get('void-purchase/{id}', array('as' => 'payment-void-purchase',
            'uses' => 'PaymentController@voidPurchaseBooking'));
    });
//  Post feedback
//    Route::post('feedback',array('as =>user-post-feedback','uses'=>'HomeController@postFeedback'));

    Route::get('terms', array('as' => 'terms-page', function () {
        return View::make('pages.termsOfService');
    }));
    Route::get('list-service', array('as' => 'list-service-page', function () {
        return View::make('pages.list-service');
    }));
    Route::get('privacy', array('as' => 'privacy-page', function () {
        return View::make('pages.privacy');
    }));
    Route::get('why-book-with-us', array('as' => 'why-book-page', function () {
        return View::make('pages.whybook');
    }));
    Route::get('contact', array('as' => 'contact-page', function () {
        return View::make('pages.contact');
    }));
    Route::get('FAQ', array('as' => 'FAQ-page', function () {
        return View::make('pages.FAQ');
    }));
    Route::get('logout', 'HomeController@logout');
    Route::get('confirm/{id_code}', array('uses' => 'HomeController@confirm'));
    Route::get('changepass/{id_code}', array('uses' => 'HomeController@changepass'));
    Route::get('admin-page', array('as' => 'admin-page', function () {
        return View::make('pages.admin-page');
    }));
    Route::get('supplier-page', array('as' => 'supplier-page', function () {
        return View::make('pages.supplier-page');
    }));

});

Route::get('language/english', array('as' => 'english-language', function () {
    Session::set('locale', 'en');
    return Redirect::back();
}));

Route::get('language/germany', array('as' => 'chinese-language', function () {
    Session::set('locale', 'de');
    return Redirect::back();
}));

Route::post('login', array( 'as' => 'user-login',
    'uses' =>'HomeController@postLogin'
));
Route::post('login-supplier', 'HomeController@postLoginSupplier');
Route::post('login-admin', 'HomeController@postLoginAdmin');

Route::post('register', array('uses' =>  'HomeController@postRegister', 'as' => 'user-register'));
Route::post('register-supplier', 'HomeController@postRegisterSupplier');

Route::post('restore', 'HomeController@postForgetpass');
//-----------login---facebook --///
Route::get('fbauth/{auth?}', array('as' => 'facebookAuth', 'uses' => 'AuthController@getFacebookLogin'));
Route::get('twitterAuth/{auth?}', array('as' => 'twitterAuth', 'uses' => 'AuthController@getTwitterLogin'));
Route::get('gauth/{auth?}', array('as' => 'googleAuth', 'uses' => 'AuthController@getGoogleLogin'));


//-----------select supplier ajax call-------------//]
/*Route::get('/ajax',array('as'=>'ajax', function()
{	if (Request::ajax()){
        return "here ajax";
    }

}));
/*Route::post('/ajax', function(){
    if (Request::ajax()){
        $input = Input::all();
        //var_dump($input['name_service']);
        return View::make('pages.contact');
    }
});*/

Route::filter('must-login', function () {
    if (!Auth::check()) {
        return Redirect::route('landing-page');
    }
});



Route::post('/ajax', 'AjaxController@postSelectSupplier');

Route::get('select-supplier', array('as' => 'select-supplier', function () {
    return View::make('ajax.select-supplier');
}));

// TRI
Route::get('supplierProfile/{supplier_id}', array('as' => 'supplier-profile' ,
        'uses' => 'APISupplierController@getSupplierProfile'));

// TAI
//Route::post('forgetPassword', 'APISupplierController@postForgotPassword');

Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::resource('apisupplier', 'APISupplierController');
});
