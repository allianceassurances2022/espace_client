<?php

namespace App\Http\Controllers\Services;


use App\wilaya;



class LoginService
{
    public function getWilayas()
    {

        $wilayas = wilaya::all()->toArray();
        $data = json_encode($wilayas);
        print_r($data);
    }
}
