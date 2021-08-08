<?php

namespace App\Http\Controllers\APIs;

use App\wilaya;

class WilayaAPI
{

    public function getWilayas()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");

        $data = wilaya::all();
        $data = json_encode($data);
        print_r($data);
    }
}
