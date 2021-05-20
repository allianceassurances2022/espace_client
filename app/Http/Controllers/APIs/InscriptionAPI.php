<?php

namespace App\Http\Controllers\APIs;

use App\CodeAssureParrain;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InscriptionAPI
{

    public function addparrain(Request $request)
    {


        $data = $request->json()->all();

        // print_r($getdata);

        $password = Str::random(8);
        $pass_hash = Hash::make($password);


        $user = new User;

        $user->name = $data['nom'];
        $user->prenom = $data['prenom'];
        $user->lieu_naissance = $data['ldn'];
        $user->wilaya = $data['nom_wilaya'];
        $user->sexe = $data['sexe'];
        $user->profession = $data['proffession'];
        $user->activite = $data['activite'];
        $user->telephone = $data['mobile'];
        $user->email = $data['email'];
        $user->password = $pass_hash;
        $user->save();


        $user_select = User::where('email', $data['email'])->get();

        $user_assure = new CodeAssureParrain;

        $user_assure->code_assure = $data['code'];
        $user_assure->id_user = $user_select[0]['id'];
        $user_assure->save();

        mail($data['email'], 'test inscription', "test");

        return $password;





        // var_dump(json_decode($data)->results[0]->points);
        //  $points = $data['points'];
        // print_r($points);

    }
}
