<?php

namespace App\Http\Controllers\Services;


use Illuminate\Http\Request;
use App\Eden_parrain;


class EdenAPI
{

    public function getParrainage(Request $request)
    {
        // header("Access-Control-Allow-Origin: *");

        $getdata = $request->json()->all();

        $code_parrain = $getdata['code_parrain'];
        $data = Eden_parrain::where('code_parrain', $code_parrain)->get();
        $data = json_encode($data);
        print_r($data);


        // var_dump(json_decode($data)->results[0]->points);
        //  $points = $data['points'];
        // print_r($points);

    }
}
