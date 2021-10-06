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

        //dd($response[0]);



        $points_collected = $response[0]['points_collected'];
        $point_to_convert = $response[0]['points_to_convert'];

        $list_of_demandes = null;

        return view('eden.points', compact('codeAssures', 'points_collected', 'point_to_convert'));
    }
}
