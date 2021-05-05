<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginAPI
{

    public function CheckUser(Request $request)
    {


        $data = $request->json()->all();

        $username = $data['email'];
        $password = $data['password'];

        $user = User::where('email', $username)->first();   

        if (Hash::check($password, $user->password)) {

            print_r(true); 
        } else {
            print_r(false); 
        }
     //   $data = json_encode($checked);
       

    }
}
