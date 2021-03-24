<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Civilite;
use App\Profession;
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

        $user = Auth::user();
        $profession = Profession::where('code',$user->profession)->first();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();


        return view('users.profil', compact('user', 'wilaya', 'profession'));
    }

    public function edit_profil() {

        $user = auth::user();
        $gender = $user->sexe;
        $professions = profession::all();
        $activities = Activity::all();
        $wilayas = wilaya::all();
        $communes = commune::all();
        $civilites = Civilite::all();


        return view('users.edit_profil', compact('user', 'wilayas', 'communes', 'gender', 'professions','activities','civilites'));
    }

    public function update_profil(request $request) {



        $user = auth::user();
        $profession = Profession::where('code',$user->profession)->first();

        if ($request->name == "" || strlen($request->name) > 20) {
            Alert::warning('Avertissement', 'Merci de verifier le nom');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->prenom == "" || strlen($request->prenom) > 20) {
            Alert::warning('Avertissement', 'Merci de verifier le prenom');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->adresse == "" || strlen($request->adresse) > 50) {
            Alert::warning('Avertissement', 'Merci de verifier l adresse');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        $date1 = $request->date_naissance;
        $date2 = date("Y-m-d");
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));

        if ($request->date_naissance == "" || $years<18 || $years>100) {
            Alert::warning('Avertissement', 'Merci de verifier la date de naissance');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        if ($request->telephone == "" || strlen($request->telephone) > 10 || strlen($request->telephone) < 1) {
            Alert::warning('Avertissement', 'Merci de verifier le numéro de téléphone');
            return redirect()->route('edit_profil', ['profile', 'index']);
        }

        $pattern="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";
        if ($request->email == "" || strlen($request->email) > 50 || !preg_match($pattern, $request->email)) {
            Alert::warning('Avertissement', 'Merci de verifier l email');
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
                'sexe' => $request->civilite,
                'profession' => $request->profession,
                'activite'     =>$request->activity,
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
                'sexe' => $request->civilite,
                'profession' => $request->profession,
                'activite'     =>$request->activity,
                'telephone' => $request->telephone,
                'email' => $request->email,
            ]);
        }


        $user = auth::user();
        $profession = Profession::where('code',$user->profession)->first();

        return view('users.profil', compact('user','profession'));
    }

}
