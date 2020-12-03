<?php

namespace App\Http\Controllers;

use App\Agences;
use App\commune;
use App\devis;
use App\Rsq_Immobilier;
use App\wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RenouvellementController extends Controller
{
    public function renouvellement_mrh (Request $request)
    {


        $reference = $request->ref;

        $id_devis = devis::all();

        $plucked =  $id_devis->pluck('id')->toArray();

     //   $id_devis = $id_devis->keys('id');

      //  dd($plucked);

        if (in_array($reference, $plucked)) {
            /*  if ($reference == "" || $reference > 20 || $reference< 1){
                  Alert::warning('Avertissement', 'Merci de faire entrer une référence');
                  //  return back();
                  return back();
              }else{
      */

            $devis = devis::where('id', $reference)
                ->where('type_devis', "2")->first();

            $risque = Rsq_Immobilier::where('code_devis', $reference)->first();

            $user = auth::user();


            $wilaya = Wilaya::all();
            $agences = Agences::all();
            $agence_map = '';

            $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
            $user_commune = commune::where('code_commune', $user->commune)->first();


            return view('renouvellement.mrh.devis_renouvellement', compact('risque', 'devis', 'user_wilaya', 'user_commune', 'wilaya', 'agences',
                'agence_map'));

        } else {

            Alert::warning('Avertissement', 'Merci de faire entrer une référence');

            return back();
        }

    }

    public function validation_devis_mrh(Request $request){

   /*     $devis = devis::where('id', $reference)
            ->where('type_devis', "2" )->first();

        $risque = Rsq_Immobilier::where('code_devis',$reference)->first();




        $wilaya  = Wilaya::all();
        $agences = Agences::all();
        $agence_map = '';

        $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
        $user_commune = commune::where('code_commune', $user->commune)->first();*/

        $user= auth::user();
        return view('renouvellement.mrh.resultat', compact('user'));


    }
}
