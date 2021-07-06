<?php

namespace App\Http\Controllers\APIs;


use Illuminate\Http\Request;
use App\Eden_parrain;
use Illuminate\Support\Facades\DB;


class EdenAPI
{

    public function getParrainage(Request $request)
    {
        //header("Access-Control-Allow-Origin: * ");

        $getdata = $request->json()->all();

        $code_parrain = $getdata['code_parrain'];

        $sql = "SELECT * FROM eden_parrain where code_parrain='" . $code_parrain . "' ";
        $data = DB::connection('backoffice')->select($sql);

        $data = json_encode($data);
        print_r($data);


        // var_dump(json_decode($data)->results[0]->points);
        //  $points = $data['points'];
        // print_r($points);

    }
}
