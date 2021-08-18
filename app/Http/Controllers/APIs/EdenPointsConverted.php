<?php

namespace App\Http\Controllers\APIs;

use App\Eden_parrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EdenPointsConverted
{

    public function getPoints(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");

        $code_assure = $request->input('code1'); //code assure

        $url = "http://41.111.145.36/backoffice/public/api/get_points_converted?code1=" . $code_assure;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        $data = json_encode($data);
        print_r($data);
    }
}
