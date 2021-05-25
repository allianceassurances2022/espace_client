<?php

namespace App\Http\Controllers\APIs;

use App\Eden_parrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdenValidationPointAPI
{

    public function updatePoints(Request $request)
    {
        // header("Access-Control-Allow-Origin: *");

        $code_assure = $request->input('code1'); //code assure
        $code = $request->input('code2'); // code hash

        $key = "djilai";
        $encryption_iv = '9567616987456256';
        $options = 0;
        $code_decrypted=openssl_decrypt(hex2bin($code_assure),'AES-128-CBC',$key, $options, $encryption_iv);


        $sql = "SELECT points FROM eden_points_converted where code_assure='". $code_decrypted."' order by created_at";
        $points_1 = DB::connection('backoffice')->select($sql);

        $points = $points_1[0]->points;

        $sql = "SELECT * FROM eden_parrain where code_parrain='". $code_decrypted."'";
        $eden_parrain = DB::connection('backoffice')->select($sql);

        if(!is_null($eden_parrain)) {

            $point_to_convert = $eden_parrain[0]->points_to_convert ;
            $point_converted = $eden_parrain[0]->points_converted ;

            $new_point_to_convert = $point_to_convert-$points;
            $new_point_converted = $point_converted+$points;


            $sql = "UPDATE eden_parrain SET points_to_convert='".$new_point_to_convert."',  points_converted='".$new_point_converted."' where code_parrain='". $code_decrypted."'";
            $update = DB::connection('backoffice')->update($sql);

            $sql = "UPDATE eden_points_converted SET is_validate='1' where code_assure='". $code_decrypted."' and code_generated='".$code."' order by created_at";
            $update = DB::connection('backoffice')->update($sql);
            if($update){
                print_r('Conversion réussite');
            }else{
                print_r('Conversion non réussite');
            }

        }


    }
}
