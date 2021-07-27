<?php

namespace App\Http\Controllers;

use App\CodeAssureParrain;
use Illuminate\Support\Facades\DB;
use App\commune;
use App\devis;
use Illuminate\Http\Request;
use App\Status_ods;
use Illuminate\Support\Facades\Auth;
use App\wilaya;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use UxWeb\SweetAlert\SweetAlert;



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
            //$datec=$value_mrh['datec'];

            $mrh = [
                'nom' => $nom,
                //'datec' => $datec,
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


        $devis = devis::where('id_user', $user->id )
                            ->where('type_devis', "1")
                            ->paginate(4, ['*'], 'p');

        $contrats = devis::where('id_user', $user->id )
                            ->where('type_devis', "2")
                            ->paginate(4,  ['*'], 'p1');

      //    $sum_auto = $devis->where('type_assurance', 'Automobile')->count();
      //    $sum_mrh = $devis->where('type_assurance', 'Multirisques Habitation')->count();
      //    $sum_catnat = $devis->where('type_assurance', 'Catastrophe Naturelle')->count();

        $sum_devis = devis::where('id_user', $user->id )
                             ->where('type_devis', "1")
                             ->count();

        $sum_contr = devis::where('id_user', $user->id )
                            ->where('type_devis', "2")
                            ->count();

        return view('home',compact('user','mrh','auto','cat','total', 'devis', 'contrats', 'sum_contr', 'sum_devis'));
    }

    public function index_table_devis(){

      $user=auth::user();

      $devis = devis::where('id_user', $user->id )
                          ->where('type_devis', "1");

      return datatables()->of($devis)
         ->addColumn('edit', function ($data) {
                    $tab = array(
                       $data->type_assurance, $data->id
                    );
                    return $tab;
          })->rawColumns(['edit'])
            ->make(true);
    }

    public function index_table_contrat(){

      $user=auth::user();

      $devis = devis::where('id_user', $user->id )
                          ->where('type_devis', "2");

      return datatables()->of($devis)
         ->addColumn('show', function ($data) {
                    $tab = array(
                       $data->type_assurance, $data->id
                    );
                    return $tab;
          })->rawColumns(['show'])
            ->make(true);
    }

    public function index_table_sinistre(Request $request){

        $id_user=$request->id;
        $code_assures=CodeAssureParrain::where('id_user',$id_user)->get();
        $code='';

        foreach ($code_assures as $code_assure) {
            $code=$code."'".$code_assure->code_assure."'";
        }

        $code=str_replace("''","','",$code);

         $url=route('api_get_alldossiersinistre');
         //$url = $url."?user_id=30&code=1000000296869";

        // $url = $url."?user_id=".$id_user."&code=".$code;
        $url = "https://epaiement.allianceassurances.com.dz/public/api/get_sinistre?user_id=".$id_user."&code=".$code;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        return datatables()->of($data)
              ->make(true);
      }


    public function renouvellement_auto(){
        return view('renouvellement.auto.auto');
    }

    public function renouvellement_mrh(){
        return view('renouvellement.mrh.mrh');
    }

    public function renouvellement_catnat(){
        return view('renouvellement.catnat.catnat');
    }

    public function renouvellement_mrp(){
        return view('renouvellement.mrp.mrp');
    }




}
