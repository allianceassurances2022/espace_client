<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use App\commune;
use App\Status_ods;
use Auth;
use App\wilaya;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {

    public function profil() {

        $user = auth::user();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();


        return view('users.profil', compact('user', 'wilaya'));
    }

    public function edit_profil() {

        $user = auth::user();
        $gender = $user->sexe;
        $job = $user->profession;
        $wilayas = wilaya::all();
        $communes = commune::all();

        /*

          $data = [
          'gender'    =>  $gender = $user->sexe,
          'job'       =>  $user->profession,
          'wilaya'    =>  wilaya::all(),
          'commune'   =>  commune::all(),
          ];

         */

        return view('users.edit_profil', compact('user', 'wilayas', 'communes', 'gender', 'job'));
    }

    public function update_profil(request $request) {

        $user = auth::user();
        //dd($request->name);
        // if ( request()->has('avatar'))
        //  dd($request->has('avatar'));

        if ($request->name == "" || strlen($request->name) > 20) {
            Alert::warning('Avertissement', 'Merci de verifier le nom');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->prenom == "" || strlen($request->prenom) > 20) {
            Alert::warning('Avertissement', 'Merci de verifier le prenom');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->adresse == "" || strlen($request->adresse) > 50) {
            Alert::warning('Avertissement', 'Merci de verifier l adresse');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }
 
        $date1 = $request->date_naissance;
        $date2 = date("Y-m-d");
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));

        if ($request->date_naissance == "" || $years<18 || $years>100) {
            Alert::warning('Avertissement', 'Merci de verifier la date de naissance');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->telephone == "" || strlen($request->telephone) > 10 || strlen($request->telephone) < 1) {
            Alert::warning('Avertissement', 'Merci de verifier le numéro de téléphone');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }
        
        $pattern="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";
        if ($request->email == "" || strlen($request->email) > 50 || !preg_match($pattern, $request->email)) {
            Alert::warning('Avertissement', 'Merci de verifier l email');
            //  return back();
            //return redirect()->route('devis_mrh')->with('value_mrh');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }


        if ($request->has('avatar')) {

            $avatar = request('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $image = image::make($avatar)->resize(256, 256)->save(public_path('user_assets/assets/uploads/avatars/' . $filename));
            $image->save();

            $user->update([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'wilaya' => $request->wilaya,
                'commune' => $request->commune,
                'adresse' => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'sexe' => $request->sexe,
                'profession' => $request->profession,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'password' => $user->password,
                'avatar' => $filename,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'wilaya' => $request->wilaya,
                'commune' => $request->commune,
                'adresse' => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'sexe' => $request->sexe,
                'profession' => $request->profession,
                'telephone' => $request->telephone,
                'email' => $request->email,
            ]);
        }


        //   $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();

        return view('users.profil', compact('user'));
    }

}
