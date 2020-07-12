<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;

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
                switch ($req->phase){
                    case 'index':
                        return view('produits.auto.index');
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

        $date_souscription=date('Y-m-d');
        $terasse=$value_mrh['terasse'];
        $habitation=$value_mrh['habitation'];
        $montant=$value_mrh['montant'];
        $juredique=$value_mrh['juredique'];
        $nbr_piece=$value_mrh['nbr_piece'];
        $datec=$value_mrh['datec'];
        $prime_total=$value_mrh['prime_total'];
        $wilaya = wilaya::all();
            

        return view('produits.mrh.devis_mrh',compact('terasse','habitation','montant','juredique','nbr_piece','datec','prime_total','date_souscription','wilaya'));
    }
    
    public function visuelisation()
    {  


        $user=auth::user();
      
        return view('produits.mrh.resultat',compact('user'));

        
       // $pdf = PDF::loadView('produits.mrh.resultat',compact('user'));

      
       // return $pdf->stream();
     
       
    }

}
