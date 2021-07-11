<?php

namespace App\Http\Controllers;

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

        $sinistre = DossierVehicule::where('id', 74)->first();
        $data = $sinistre->toArray();

        return $data;
    }
}
