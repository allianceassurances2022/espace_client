<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\Agences;

use PDF;
use auth;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('produits.index');
    }
    public function selection(request $req)
    {
        switch ($req->produit) {
            case 'auto':
            $wilaya = wilaya::all();
                switch ($req->phase){
                    case 'index':
                        return view('produits.auto.index',compact('wilaya'));
                        break;
                    case 'laki':
                        return view('produits.auto.formule_laki');
                        break;
                    case 'part':
                        return view('produits.auto.formule_part');
                        break;
                }
                break;
            case 'catnat':
                switch ($req->phase){
                    case 'index':
                        return view('produits.catnat.index');
                        break;
                    case 'commerce':
                        return view('produits.catnat.formule_commerce');
                        break;
                    case 'habitation':
                        return view('produits.catnat.formule_habitation');
                        break;
                    case 'industrielle':
                        return view('produits.catnat.formule_industrielle');
                        break;
                    case 'construction':
                        return view('produits.catnat.construction');
                        break;     
                }
                break;
            case 'mrh':
                switch ($req->phase){
                    case 'index':
                        return view('produits.mrh.index');
                        break;
                    
                }
                break;
            case 'mrp':
                switch ($req->phase){
                    case 'index':
                        return view('produits.professionnel.index');
                        break;
                    case 'garanties':
                        return view('produits.professionnel.garanties');
                        break;    
                }
                break;    
            default:
                return view('produits.index');
                break;
        }
    }

    public function devis_mrh()
    { 

        $value_mrh = session('data_mrh');
        
        $date_souscription=date('d/m/Y');
        
        $terasse=$value_mrh['terasse'];
        
        $habitation=$value_mrh['habitation'];
        
        $montant=$value_mrh['montant'];
        
        $juredique=$value_mrh['juredique'];
        
        $nbr_piece=$value_mrh['nbr_piece'];
        
        $datec=$value_mrh['datec'];
        
        $prime_total=$value_mrh['prime_total'];
        
        $wilaya = wilaya::all();
        $agences = Agences::all();

         $wilaya_selected = 1;

        return view('produits.mrh.devis_mrh',compact('terasse','habitation','montant','juredique','nbr_piece','datec','prime_total','date_souscription','wilaya','wilaya_selected','agences'));
    }

    public function devis_auto()
    { 

        $data_session = [
                      'date_conducteur' => $daten,
                      'date_permis' => $date_permis,
                      'wilaya' => $wilaya,
                      'annee_auto' => $annee_auto,
                      'puissance' => $puissance,
                      'usage' => $usage,
                      'valeur' => $valeur,
                      'offre' => $offre,
                      'dure' => $dure,
                      'formule' => $formule,
                      'assistance' => $assistance,
                      'prime_total' => $devis,
                       ];

        $value_auto = session('data_auto'); 
        $date_souscription=date('d/m/Y');  
        $date_conducteur=$value_auto['terasse'];  
        $date_permis=$value_mrh['habitation'];  
        $wilaya=$value_mrh['montant'];   
        $annee_auto=$value_mrh['juredique'];     
        $puissance=$value_mrh['nbr_piece'];
        $usage=$value_mrh['usage'];
        $valeur=$value_mrh['valeur'];
        $offre=$value_mrh['offre'];
        $dure=$value_mrh['dure'];
        $formule=$value_mrh['formule'];
        $assistance=$value_mrh['assistance'];
        $prime_total=$value_mrh['prime_total'];
        $datec=$value_mrh['datec'];
        
        $wilaya = wilaya::all();
        $agences = Agences::all();

         $wilaya_selected = 1;

        return view('produits.Auto.devis_auto',compact('terasse','habitation','montant','juredique','nbr_piece','datec','prime_total','date_souscription','wilaya','wilaya_selected','agences'));
    }
    
    public function visuelisation()
    {  


        $user=auth::user();
      
      
        
        $pdf = PDF::loadView('pdf_resultat_mrh',compact('user'));

      
        return $pdf->stream();
     
       
    }
    public function devis_catnat()
    { 

        $value_catnat = session('data_catnat');
        
        $date_souscription=date('d/m/Y');
        
        $type_formule=$value_catnat['type_formule'];
        
        $type_const=$value_catnat['type_const'];
        
        $Contenant=$value_catnat['Contenant'];
        
        $equipement=$value_catnat['equipement'];
        
        $marchandise=$value_catnat['marchandise'];
        $act_reg=$value_catnat['act_reg'];
        
        $reg_com=$value_catnat['reg_com'];
        
        $loca=$value_catnat['loca'];
        
        $commune_selected=$value_catnat['commune_selected'];
        
        $wilaya_selected=$value_catnat['wilaya_selected'];
        
        $anne_cont=$value_catnat['anne_cont'];
        
        $surface=$value_catnat['surface'];
        
        $permis=$value_catnat['permis'];
        
        $val_assur=$value_catnat['val_assur'];
        
        $reg_para=$value_catnat['reg_para'];
        
        
        $datec=$value_catnat['datec'];
        
        $prime_total=$value_catnat['prime_total'];
        
        $wilaya = wilaya::all();
        $agences = Agences::all();

         $wilaya_selected = 1;

        return view('produits.catnat.devis_catnat',compact('type_formule','type_const','Contenant','equipement','marchandise','act_reg','reg_com','loca','anne_cont','surface','permis','val_assur','reg_para','datec','prime_total','date_souscription','wilaya','wilaya_selected','agences'));
    }

}
