<?php

namespace App\Http\Controllers\APIs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetNearestAgencesAPI
{

    
    function get_distance_m($lat1, $lng1, $lat2, $lng2) {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return ($earth_radius * $d);
      }

    public function getNearestAgences(Request $request)
    {
        /*header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header("Content-Type:application/json");*/

        $coordinates = $request->json()->all();

        $lat1 = $coordinates['lat'];
        $lng1 = $coordinates['lng'];

        $sql = "SELECT Name as title, Latitude as lat, Longetude as lng FROM agences ";
        $data = DB::connection('mysql')->select($sql);
        $tab = array();
        $tab_coordinates = array();

        for($i=0; $i<count($data); $i++){
        $lat2 = $data[$i]->lat;
        $lng2 = $data[$i]->lng;
        $result=$this->get_distance_m($lat1, $lng1, $lat2, $lng2);
        
        $tab[$i]=$result / 1000;
        $tab_coordinates[$i]["lat"] =$lat2;
        $tab_coordinates[$i]["lng"] =$lng2;
        }
        $index = array_keys($tab, min($tab));
       // print_r($min);
       // print_r("\n".$index[0]);
        $js = array();
        $js["lat"]=$tab_coordinates[$index[0]]["lat"];
        $js["lng"]=$tab_coordinates[$index[0]]["lng"];
        $data = json_encode($js);
        print_r($data);

    }
}
