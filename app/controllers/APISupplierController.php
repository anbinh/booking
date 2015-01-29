<?php

class APISupplierController extends BaseController {

    public function __construct()
    {

    }

    public function getIndex()
    {
        return View::make('home.index');
    }

    public  function getUserById($id)
    {
        $user = User::find($id);
        return Response::json(array(
                'error' => false,
                'users' => $user->toArray()),
            200
        );
    }

//    public function getTest(){
//        return Response::json(array(
//                'error' => false,
//                'message' => "get"),
//            200
//        );
//    }
    public function Test($id){
        $input = Input::json()->all();

        $services = Service::find($id)->suppliers;

        return Response::json(array(
                'error' => false,
                'message' => $services),
            200
        );
    }
    public function index()
    {
        return Response::json(array(
                'error' => false,
                'message' => "post"),
            200
        );
    }
    public function postRegister(){
        $input = Input::json()->all();
        $user = User::where('email', '=', $input['email'])->first();

        if($user!=null){
            return Response::json(array(
                    'error' => true,
                    'message' => 'email_exist'),
                200
            );
        }
        else{
            $user = new User();
            $user->username = $input["username"];
            $user->first_name = $input["first_name"];
            $user->last_name = $input["last_name"];
            $user->email = $input["email"];
            $user->phone_number = $input["phone_number"];
            if($user->save()){
                $user_id = $user->id;

                $supplier = new Supplier();
                $supplier->user_id = $user_id;
                $supplier->company_name = $input["company_name"];
                $supplier->office_address = $input["office_address"];
                $supplier->license_number = $input["license_number"];
                $supplier->save();
                $supplier->services()->attach($input['supplier_service']);
            }
            return Response::json(array(
                    'error' => false,
                    'message' => 'register_successful'),
                200
            );
        }

    }
    public function postForgotPassword(){
        $email = Input::json()->all();
        $user = User::where('email', '=', $email)->first();
        if($user == null){
            return Response::json(array(
                    'error' => true,
                    'message' => "That e-mail address doesn't match any user accounts. Are you sure you've registered?"),
                200
            );
        }
        else{
            for($code_length = 11, $newcode = ''; strlen($newcode) < $code_length; $newcode .= chr(!rand(0, 2) ? rand(48, 57) : (!rand(0, 1) ? rand(65, 90) : rand(97, 122))));

            // send email
            $data = array(
                'email'		=> $user->email,
                'username'  => $user->username,
                'password'	=> $newcode
            );
            $user->pass_reset = Hash::make($newcode);
            $user->password = Hash::make($newcode);
            $user->save();
            try {
                Mail::send('emails.newpass', $data, function($message) use ($data)
                {
                    $message->to($data['email'])->subject('Reset password');
                });
            }
            catch (Exception $e){
                $to      = $data['email'];
                $subject = '[Homeez] Reset password';
                $message = View::make('emails.resetpass', $data)->render();
                $headers = 'From: admin@homeez.com' . "\r\n" .
                    'Reply-To: admin@homeez.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-Type: text/html; charset=ISO-8859-1\r\n';

                mail($to, $subject, $message, $headers);

            }

            return Response::json(array(
                    'error' => false,
                    'message' => "Password has changed."),
                200
            );
        }
    }

    public function getSupplierProfile($supplier_id)
    {
        $supplier = Supplier::where('id','=',$supplier_id);
        if($supplier->count())
        {
            $supplier = $supplier -> first();
            $supplier->User;
            return Response::json(array(
                    'error' => false,
                    'supplier' => $supplier),
                200
            );
        }
        return Response::json(array(
                'error' => 'not found'),
            404
        );
    }


}