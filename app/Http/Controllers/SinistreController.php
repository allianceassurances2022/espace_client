<?php

namespace App\Http\Controllers;

use App\DossierSinistre;
use Illuminate\Http\Request;
use App\DossierVehicule;
use Illuminate\Support\Facades\Auth;

class SinistreController extends Controller
{
    public function index_sinistre()
    {

        return view('sinistre.declaration');
    }

    public function index()
    {
        if (Auth::user()) {
            return view('sinistre.logged');
        } else {
            return view('sinistre.not_logged');
        }
    }

    public function getData()
    {

        $vehicule = DossierVehicule::where('num_police', 1303485412365)->first();
        $sinistre = DossierSinistre::where('num_police', 1303485412365)->first();

        $data1 = $vehicule->toArray();
        $data2 = $sinistre->toArray();

        $data = array();
        $data = [
            'data1' => $data1,
            'data2' => $data2,
        ];


        return $data;
    }
}
