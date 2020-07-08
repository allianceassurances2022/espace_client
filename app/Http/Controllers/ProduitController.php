<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('produits.mrh.devis_mrh',compact('value_mrh'));
    }
    
}
