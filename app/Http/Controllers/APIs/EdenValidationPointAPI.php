<?php

namespace App\Http\Controllers\APIs;

use App\Eden_parrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EdenValidationPointAPI
{

    public function updatePoints(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");

        $code_assure = $request->input('code1'); //code assure
        $code = $request->input('code2'); // code hash

        $url = "http://41.111.145.36/backoffice/public/api/get_points?code1=" .$code_assure . "&code2=" . $code;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        $data = json_encode($data);
        print_r($data);

    }
}
