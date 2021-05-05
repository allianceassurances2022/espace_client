<?php

namespace App\Http\Controllers\APIs;

use App\wilaya;

class WilayaAPI
{

    public function getWilayas()
    {
        $data = wilaya::all();
        $data = json_encode($data);
        print_r($data);
    }
}
