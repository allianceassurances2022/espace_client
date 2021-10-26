<?php

namespace App\Http\Controllers\APIs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetUserByPoliceAPI
{
    public function getUserByPolice(Request $request)
    {

        $user_code_assure = $request->input('code'); //code assure
        $client = new \GuzzleHttp\Client();
        $url = "http://41.111.145.36/api/get_user_police?code=".$user_code_assure;
        $data = Http::contentType("application/json")->send('GET',$url)->json();

        $data = json_encode($data);
        print_r($data);
    }


}
