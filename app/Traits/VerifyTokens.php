<?php

namespace App;

use App\Http\Requests\Request;

Trait VerifyToken{

    public function postVerifyToken(Request $Request)
    {

        dd($request->get('token'));

    }      

}