<?php

namespace App\Http\Controllers\APIs;

use App\commune;
use Illuminate\Http\Request;


class CommuneAPI
{

    public function getCommunesByCodeWilaya(Request $request)
    {

        //  header("Access-Control-Allow-Origin: * ");

        $getdata = $request->json()->all();

        $code_wilaya = $getdata['code_wilaya'];
        $data_ = Commune::where('code_wilaya', $code_wilaya)->get();


        $i = 0;
        foreach ($data_ as $data) {
            $data_formed[$i] = [
                'lib_commune' => $data['lib_commune'],
                'code_commune' => $data['code_commune']
            ];
            $i++;
        }


        $data_formed = json_encode($data_formed);
        print_r($data_formed);
    }
}
