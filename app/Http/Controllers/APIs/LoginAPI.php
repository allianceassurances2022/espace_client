<?php

namespace App\Http\Controllers\APIs;

use App\CodeAssureParrain;
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


        $code = CodeAssureParrain::where('id_user', $user['id'])->first();
        $codeAssure = $code['code_assure'];
        
         if (Hash::check($password, $user->password)) {
            $data = [
                'check' => true,
                'code_assure' => $codeAssure,
                'id_user'   => $user['id']
            ];
            $data = json_encode($data);
            print_r($data);
        } else {
            print_r(false);
        }


        //   $data = json_encode($checked);

        //$user = json_encode($user);

    }
}
