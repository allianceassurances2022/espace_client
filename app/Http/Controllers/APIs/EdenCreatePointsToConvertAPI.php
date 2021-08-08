<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EdenCreatePointsToConvertAPI
{

    public function getCreatePointsToConvert (Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");

        $code_parrain = $request->input('code1'); //code assure
        $points = $request->input('code2'); //points

        $url = "http://41.111.145.36/backoffice/public/api/get_create_points?code1=" +$code_parrain + "&code2=" + $points;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        $data = json_encode($data);
        print_r($data);
        }
    }
