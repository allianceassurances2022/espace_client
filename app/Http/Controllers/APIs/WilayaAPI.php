<?php

namespace App\Http\Controllers\APIs;

use App\wilaya;

class WilayaAPI
{

    public function getWilayas()
    {
        header("Access-Control-Allow-Origin: *");

        $data = wilaya::all();
        $data = json_encode($data);
        print_r($data);
    }
}
