<?php

namespace App\Http\Controllers;

use App\CodeAssureParrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EdenController extends Controller
{
    public function index()
    {



        $dataAssure = CodeAssureParrain::where('id_user', Auth::user()->id)->first();

        // $codeAssures = $dataAssure->pluck('code_assure');
        // $codeAssures =  $codeAssures->join("','");

        //dd($dataAssure);
        $codeAssures = $dataAssure->code_assure;

        $url = "https://epaiement.allianceassurances.com.dz/public/api/get_parrainage?code=" . $codeAssures . "";
        $response = Http::contentType("application/json")
            ->send('GET', $url)
            ->json();

        // dd($response);
        $points_collected = $response[0]['points_collected'];
        $point_to_convert = $response[0]['points_to_convert'];

        ////////////////////////////////////// get list points to convert ///////////////////////////////////////

        $url = "https://epaiement.allianceassurances.com.dz/public/api/get_points_converted?code1=" . $codeAssures . "";
        //dd($url);
        $response = Http::contentType("application/json")
            ->send('GET', $url)
            ->json();

        // dd($response);
        $count = 1;
        $data_demandes = $response;


        return view('eden.points', compact('codeAssures', 'points_collected', 'point_to_convert', 'data_demandes', 'count'));
    }
    /*   public function data_demande()
    {
        $dataAssure = CodeAssureParrain::where('id_user', Auth::user()->id)->first();
        $codeAssures = $dataAssure->code_assure;

        $url = "https://epaiement.allianceassurances.com.dz/public/api/get_points_converted?code1=" . $codeAssures . "";
        $data = Http::contentType("application/json")
            ->send('GET', $url)
            ->json();

        dd($data);

        return $data;

        // dd($response);
        // $data_demandes = $data;

    }*/
}
