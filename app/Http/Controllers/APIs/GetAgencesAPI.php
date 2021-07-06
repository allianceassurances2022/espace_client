<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Support\Facades\DB;

class GetAgencesAPI
{

    public function getAgences()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");

        $sql = "SELECT Name as title, Latitude as lat, Longetude as lng FROM agences ";
        $data = DB::connection('mysql')->select($sql);
       // $data = json_encode($data);
        print_r($data);

    }
}
