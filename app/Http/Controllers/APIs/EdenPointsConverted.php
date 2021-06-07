<?php

namespace App\Http\Controllers\APIs;

use App\Eden_parrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdenPointsConverted
{

    public function getPoints(Request $request)
    {
        header("Access-Control-Allow-Origin: * ");

        $code_assure = $request->input('code1'); //code assure

        $sql = "SELECT * FROM eden_points_converted where code_assure='" . $code_assure . "' and is_validate='0' ORDER BY created_at desc";
        $data = DB::connection('backoffice')->select($sql);

        $data = json_encode($data);

        print_r($data);
        // return $data;
    }
}
