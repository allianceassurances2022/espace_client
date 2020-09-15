<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\commune;
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
            $auto = [
              "Wilaya_selected" => "1",
              "puissance"       => "0",
              "type_assurance"  => "AUTO_P"
            ];
                switch ($req->phase){
                    case 'index':
                        return view('produits.auto.index',compact('wilaya','auto'));
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
              $formul = "Habitation";
                switch ($req->phase){
                    case 'index':
                        return view('produits.catnat.index',compact('formul'));
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

        $value_mrh         = session('data_mrh');
        $date_souscription = date('Y-m-d');
        $terasse           = $value_mrh['terasse'];
        $habitation        = $value_mrh['habitation'];
        $montant           = $value_mrh['montant'];
        $juredique         = $value_mrh['juredique'];
        $nbr_piece         = $value_mrh['nbr_piece'];
        $datec             = $value_mrh['datec'];
        $prime_total       = $value_mrh['prime_total'];
        $wilaya            = wilaya::all();
        $agences           = Agences::all();
        $wilaya_selected   = 1;
        $agence_map = '';


        return view('produits.mrh.devis_mrh',compact('terasse','habitation','montant','juredique','nbr_piece','datec','prime_total','date_souscription','wilaya',
        'wilaya_selected','agences','agence_map'));
    }

    public function devis_auto()
    {


        $value_auto        = session('data_auto');
        $date_souscription = date('Y-m-d');
        $date_conducteur   = $value_auto['date_conducteur'];
        $date_permis       = $value_auto['date_permis'];
        $wilaya_selected   = $value_auto['wilaya'];
        $annee_auto        = $value_auto['annee_auto'];
        $puissance         = $value_auto['puissance'];
        $usage             = $value_auto['usage'];
        $valeur            = $value_auto['valeur'];
        $offre             = $value_auto['offre'];
        $dure              = $value_auto['dure'];
        $formule           = $value_auto['formule'];
        $assistance        = $value_auto['assistance'];
        $taxe              = $value_auto['taxe'];
        $date_taxe         = $value_auto['date_taxe'];
        $prime_total       = $value_auto['prime_total'];
        $datec             = $value_auto['datec'];


        $wilaya  = Wilaya::all();
        $agences = Agences::all();
        $agence_map = '';

        return view('produits.Auto.devis_auto',compact('date_souscription','date_conducteur','date_permis','wilaya','annee_auto','puissance','usage','valeur','offre',
        'dure','taxe','date_taxe','formule','assistance','prime_total','datec','wilaya','agences','wilaya_selected','agence_map'));
    }

    public function visuelisation()
    {

        $user= auth::user();
        $pdf = PDF::loadView('pdf_resultat_mrh',compact('user'));
        return $pdf->stream();

    }
    public function devis_catnat()
    {
         $value_catnat      = session('data_catnat');
         $date_souscription = date('Y-m-d');
         $type_formule      = $value_catnat['type_formule'];
         $type_const        = $value_catnat['type_const'];
         $Contenant         = $value_catnat['Contenant'];
         $equipement        = $value_catnat['equipement'];
         $marchandise       = $value_catnat['marchandise'];
         $contenu           = $value_catnat['contenu'];
         $act_reg           = $value_catnat['act_reg'];
         $reg_com           = $value_catnat['reg_com'];
         $loca              = $value_catnat['loca'];
         $commune_selected  = $value_catnat['commune_selected'];
         $wilaya_selected   = $value_catnat['wilaya_selected'];
         $anne_cont         = $value_catnat['anne_cont'];
         $surface           = $value_catnat['surface'];
         $permis            = $value_catnat['permis'];
         $val_assur         = $value_catnat['val_assur'];
         $reg_para          = $value_catnat['reg_para'];
         $datec             = $value_catnat['datec'];
         $prime_total       = $value_catnat['prime_total'];
         $wilaya            = wilaya::all();
         $agences           = Agences::all();
         $wilaya_selected   = $value_catnat['wilaya_selected'];
         $commune_selected  = $value_catnat['commune_selected'];
         $appartient        = "oui";
         $agence_map        = '';

         $commune_selected  = commune::where('code_commune',$commune_selected)->first();
         $wilaya_selected   = wilaya::where('code_wilaya',$wilaya_selected)->first();

        return view('produits.catnat.devis_catnat',compact('type_formule','type_const','Contenant','equipement','marchandise','contenu','act_reg','reg_com','agence_map',
        'loca','anne_cont','surface','permis','val_assur','reg_para','datec','prime_total','date_souscription','wilaya','wilaya_selected','commune_selected','agences','appartient'));
    }

}
