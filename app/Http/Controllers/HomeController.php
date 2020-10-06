<?php

namespace App\Http\Controllers;

use App\commune;
use App\devis;
use Illuminate\Http\Request;
use App\Status_ods;
use Auth;
use App\wilaya;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth::user();
        $value_cat = session('data_catnat');
        $value_mrh = session('data_mrh');
        $value_auto = session('data_auto');
        $cat='';
        $auto='';
        $mrh='';
        $total = 0;

        if ($value_cat) {
        	$nom = 'Catastrophe Naturelle';
        	$montant = $value_cat['prime_total'];
            $total=$total+$montant;
            $datec=$value_cat['datec'];

        	$cat = [
                'nom' => $nom,
                'datec' => $datec,
        		'montant' => $montant
        	];
        }

        if ($value_mrh) {

            $nom = 'Multirisques Habitation';
            $montant = $value_mrh['prime_total'];
            $total=$total+$montant;
            $datec=$value_mrh['datec'];

            $mrh = [
                'nom' => $nom,
                'datec' => $datec,
                'montant' => $montant
            ];

        }

        if ($value_auto) {

            $nom = 'Automobile';
            $montant = $value_auto['prime_total'];
            $total=$total+$montant;
            $datec=$value_auto['datec'];

            $auto = [
                'nom' => $nom,
                'datec' => $datec,
                'montant' => $montant
            ];

        }

        $devis = devis::where('id_user', $user->id )->get();


        return view('home',compact('user','mrh','auto','cat','total', 'devis'));
    }

    public function profil(){

        $user=auth::user();
        $wilaya = wilaya::where('code_wilaya', $user->wilaya )->first();;


        return view('core.home.profil', compact('user', 'wilaya'));
    }

    public function  edit_profil(){

        $user=auth::user();
        $wilayas = wilaya::all();
        $communes = commune::all();

        return view('core.home.edit_profil', compact('user', 'wilayas','communes'));
    }


}
