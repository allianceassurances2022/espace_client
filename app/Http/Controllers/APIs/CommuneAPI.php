<?php

namespace App\Http\Controllers\APIs;

use App\commune;
use Illuminate\Http\Request;
use App\User;
use App\wilaya;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CommuneAPI
{

    public function getCommunesByCodeWilaya(Request $request)
    {
        $getdata = $request->json()->all();

        $code_wilaya = $getdata['code_wilaya'];
        $data = Commune::where('code_wilaya', $code_wilaya)->get();
        $data = json_encode($data);
        print_r($data);
    }
}
