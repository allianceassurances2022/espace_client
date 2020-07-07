<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status_ods;
use Auth;
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
    { $user=auth::user();
        $value_cat = session('data_catnat');
        $value_mrh = session('data_mrh');
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
        return view('home',compact('user','mrh','auto','cat','total'));
    }
}
