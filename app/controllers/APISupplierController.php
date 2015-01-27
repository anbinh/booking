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

}