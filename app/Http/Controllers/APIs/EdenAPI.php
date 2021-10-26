<?php

namespace App\Http\Controllers\APIs;


use Illuminate\Http\Request;
use App\Eden_parrain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class EdenAPI
{

    public function getParrainage(Request $request)
    {
        $code_parrain = $request->input('code'); //code assure

        $url = "http://41.111.145.36/api/get_parrainage?code=".$code_parrain;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        $data = json_encode($data);
        print_r($data);

    }
}
