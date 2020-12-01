<?php

namespace App\Http\Controllers;

use App\Agences;
use App\commune;
use App\devis;
use App\Rsq_Immobilier;
use App\wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenouvellementController extends Controller
{
    public function renouvellement_mrh (Request $request){


        $reference = $request->ref;

        $devis = devis::where('id', $reference)
            ->where('type_devis', "2" )->first();

        $risque = Rsq_Immobilier::where('code_devis',$reference)->first();

        $user= auth::user();


        $wilaya  = Wilaya::all();
        $agences = Agences::all();
        $agence_map = '';

        $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
        $user_commune = commune::where('code_commune', $user->commune)->first();





        //   dd($risque);

        return view('renouvellement.mrh.devis_renouvellement', compact('risque','devis','user_wilaya','user_commune','wilaya','agences',
        'agence_map'));
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
