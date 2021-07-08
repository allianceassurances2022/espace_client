<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinistreController extends Controller
{
    public function index_sinistre()
    {

        return view('sinistre.declaration');
    }
}
