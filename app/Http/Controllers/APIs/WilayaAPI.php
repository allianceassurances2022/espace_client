<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\User;
use App\wilaya;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class WilayaAPI
{

    public function getWilayas()
    {
        $data = wilaya::all();
        $data = json_encode($data);
        print_r($data);
    }
}
