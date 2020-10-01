<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\commune;
use App\Status_ods;
use Auth;
use App\wilaya;


class UserController extends Controller
{
    public function profil(){

        $user=auth::user();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();


        return view('core.home.profil', compact('user', 'wilaya'));
    }

    public function  edit_profil(){

        $user=auth::user();
        $gender = $user->sexe;
        $job = $user->profession;
        $wilayas = wilaya::all();
        $communes = commune::all();


        return view('core.home.edit_profil', compact('user', 'wilayas','communes','gender', 'job'));
    }

    public function update_profil( request $request ){

        $user=auth::user();

        $user->update([
            'name'      => $request->name,
            'prenom'    => $request->prenom,
            'wilaya'    => $request->wilaya,
            'commune'    => $request->commune,
            'adresse'    => $request->adresse,
            'date_naissance'    => $request->date_naissance,
            'sexe'              => $request->sexe,
            'profession'        => $request->profession,
            'telephone'         => $request->telephone,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
        ]);
     //   $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();

        return view('core.home.profil', compact('user'));
    }
}
