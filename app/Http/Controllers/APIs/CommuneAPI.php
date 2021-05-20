<?php

namespace App\Http\Controllers\APIs;

use App\commune;
use Illuminate\Http\Request;


class CommuneAPI
{

    public function getCommunesByCodeWilaya(Request $request)
    {

        header("Access-Control-Allow-Origin: '*' ");

        $getdata = $request->json()->all();

        $code_wilaya = $getdata['code_wilaya'];
        $data = Commune::where('code_wilaya', $code_wilaya)->get();
        $data = json_encode($data);
        print_r($data);
    }
}
