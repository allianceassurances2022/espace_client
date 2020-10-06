<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image as InterventionImage;

use App\commune;
use App\Status_ods;
use Auth;
use App\wilaya;



class UserController extends Controller
{
    public function profil(){

        $user=auth::user();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();


        return view('users.profil', compact('user', 'wilaya'));
    }


    public function  edit_profil(){

        $user=auth::user();
        $gender = $user->sexe;
        $job = $user->profession;
        $wilayas = wilaya::all();
        $wilaya_ = wilaya::where('code_wilaya', $user->wilaya )->first();


        $communes = commune::all();
        $commune_ = commune::where('code_commune', $user->commune )->first();


        return view('users.edit_profil', compact('user', 'wilayas','wilaya_','communes', 'commune_','gender', 'job'));
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


        ]);

     //   if($request->hasFile('photo')){

           // dd('helllo');
          //$avatar = $request->file('avatar');

           //filename = time().'.'.$avatar->getClientOriginalExtension();

           //mage::make($avatar)->resize(256, 256)->save(public_path('user_assets/assets/uploads/avatars/'.$filename));
           // $user = Auth::user();



        /*    $user->update([

                'profil_picture'     => $filename,
                ]);
*/
         //   $user->profil_picture = $filename;

           // $user->save();
    //    }


        if ( request('avatar')){

            $avatar = request('avatar');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            $image  = image::make($avatar)->resize(256, 256)->save(public_path('user_assets/assets/uploads/avatars/'.$filename));

            $image->save();

            $user->update([

                'profil_picture'     => $filename,
            ]);

        }



        //   $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();

        return view('users.profil', compact('user'));
    }
}
