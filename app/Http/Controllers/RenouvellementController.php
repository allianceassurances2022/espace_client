<?php

namespace App\Http\Controllers;

use App\Agences;
use App\commune;
use App\devis;
use App\marque;
use App\Rsq_Immobilier;
use App\Rsq_Vehicule;
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


        if (in_array($reference, $plucked)) {

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

    public function renouvellement_auto (Request $request)
    {
        $reference = $request->ref;

        $id_devis = devis::all();
        $plucked =  $id_devis->pluck('id')->toArray();


        if (in_array($reference, $plucked)) {

            $devis = devis::where('id', $reference)
                ->where('type_devis', "2")->first();

            $risque = Rsq_Vehicule::where('code_devis', $reference)->first();

         //   dd($risque);

            $user = auth::user();


            $wilaya = Wilaya::all();
            $agences = Agences::all();
            $agence_map = '';

            $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
            $user_commune = commune::where('code_commune', $user->commune)->first();



            $categorie = $risque->categorie;

            $date_permis = $risque->date_conducteur;
            $wilaya_obtention = $risque->wilaya_obtention;
            $annee_auto = $risque->annee_mise_circulation;
            $puissance = $risque->puissance;
            $usage = $risque->usage;
            $formule = $risque->code_formule;
            $assistance_nom = $risque->assistance;
            $offre = $risque->offre;
            $taxe = $risque->taxe;
            $matricule = $risque->matricule;
            $num_chassis = $risque->num_chassis;
            $type = $risque->type;
            $couleur = $risque->couleur;
            $marque_selected = $risque->marque;
            $model = $risque->modele;
            $permis_num = $risque->permis_num;

            return view('renouvellement.auto.devis_renouvellement', compact('risque', 'devis', 'user_wilaya', 'user_commune', 'wilaya', 'agences',
                'agence_map','marque_selected','categorie','date_permis','wilaya_obtention','annee_auto','puissance','usage',
                'formule','assistance_nom','taxe','matricule','num_chassis','type','couleur','model','permis_num'));

        } else {

            Alert::warning('Avertissement', 'Merci de faire entrer une référence');
            return back();
        }

    }


    public function validation_devis_auto(Request $request){

    }

    public function renouvellement_catnat (Request $request)
    {
        $reference = $request->ref;
        $id_devis = devis::all();
        $plucked =  $id_devis->pluck('id')->toArray();



        if (in_array($reference, $plucked)) {

            $devis = devis::where('id', $reference)
                ->where('type_devis', "2")->first();

            $risque = rsq_immobilier::where('code_devis', $reference)->first();

            $user= auth::user();

            $assure = [
                'nom'            => $user->name,
                'prenom'         => $user->prenom,
                'date_naissance' => $user->date_naissance ,
                'code_wilaya'    => $user->wilaya_assure ,
                'profession'     => $user->profession ,
                'telephone'      => $user->telephone ,
                'sexe'           => $user->sexe,
                'adresse'        => $user->adresse,
            ];

            $assure = (object)$assure;
            $type_formule = '';
            $type_const = $risque->type_habitation;
            $Contenant= $risque->valeur_contenant;
            $equipement = $risque->valeur_contenant;
            $marchandise = $risque->valeur_marchandise;
            $contenu = $risque->valeur_contenu;
            $act_reg = $risque->registe_com;
            $reg_com = '';
            $agence_map = '';
            $loca= $risque->local_assure;
            $anne_cont = $risque->annee_construction;
            $surface =$risque->superficie;
            $permis=$risque->permis;
            $val_assur=$risque->valeur_assure;
            $reg_para=$risque->reg_para;
            $datec='';
            $prime_total='';

            $date_souscription = '';
            $wilaya_selected = wilaya::where('code_wilaya', $user->wilaya)->first();
            $commune_selected = commune::where('code_commune', $user->commune)->first();

            $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
            $user_commune = commune::where('code_commune', $user->commune)->first();

            $appartient ='';
            $agences = Agences::all();

            $wilaya = Wilaya::all();

            return view('renouvellement.catnat.devis',compact('type_formule','type_const','Contenant','equipement','marchandise','contenu','act_reg','reg_com','agence_map',
                'loca','anne_cont','surface','permis','val_assur','reg_para','datec','prime_total','date_souscription','wilaya_selected','commune_selected','agences','appartient',
                'assure','user_wilaya','user_commune','wilaya'));

        } else {

            Alert::warning('Avertissement', 'Merci de faire entrer une référence');
            return back();
        }



        }
}
