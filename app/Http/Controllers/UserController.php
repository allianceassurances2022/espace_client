<?php

namespace App\Http\Controllers;



use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

use App\commune;
use App\Status_ods;
use Auth;
use App\wilaya;
use Intervention\Image\Facades\Image;



class UserController extends Controller
{
    public function profil()
    {

        $user = auth::user();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();


        return view('users.profil', compact('user', 'wilaya'));
    }


    public function edit_profil()
    {

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

    public function update_profil(request $request)
    {

        $user = auth::user();

        // if ( request()->has('avatar'))
        //  dd($request->has('avatar'));
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

    public function generate_pdf(Request $request)
    {


        //$items = DB::table("items")->get();
       // view()->share('items', $items);
        if ($request->has('download')) {

            $pdf = App::make('dompdf.wrapper');
            $pdf ->loadView('page');
            return $pdf->download('page.pdf');
        }
    }
}
