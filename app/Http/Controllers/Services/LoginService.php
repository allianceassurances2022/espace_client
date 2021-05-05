<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginService
{

    public function CheckUser(Request $request)
    {


        $data = $request->json()->all();

        $username = $data['email'];
        $password = $data['password'];

        $user = User::where('email', $username)->first();
        // $pass = User::where('password', $password)->get();

        // $user->toJson();

        // print_r($user->password);


        if (Hash::check($password, $user->password)) {

            print_r(true); 
        } else {
            print_r(false); 
        }
     //   $data = json_encode($checked);
       

    }
}
