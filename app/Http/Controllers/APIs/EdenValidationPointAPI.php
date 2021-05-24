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

        // Store the cipher method
        $ciphering = "AES-128-CTR";
  
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
  
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
  
        // Store the encryption key
        $encryption_key = "azerty";
  
        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($code_assure, $ciphering,
                    $encryption_key, $options, $encryption_iv);
  
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';
  
        // Store the decryption key
        $decryption_key = "azerty";
  
        // Use openssl_decrypt() function to decrypt the data
        $code_decrypted=openssl_decrypt ($encryption, $ciphering, 
                $decryption_key, $options, $decryption_iv);


        $sql = "SELECT points FROM eden_points_converted where code_assure='". $code_decrypted."' order by created_at";
        $points = DB::connection('backoffice')->select($sql);

        $eden_parrain = Eden_parrain:: where('code_parrain',$code_assure)->first();


        $point_to_convert = $eden_parrain->points_to_convert ;
        $point_converted = $eden_parrain->points_to_convert ;
        
        $new_point_to_convert = $point_to_convert-$points;
        $new_point_converted = $point_converted+$points;

        $eden_parrain->update([
                    'points_to_convert'   => $new_point_to_convert,
                    'points_converted'    => $new_point_converted
                    ]);

        if($eden_parrain) {
            $sql = "UPDATE eden_points_converted SET is_validate='1' where code_assure='". $code_decrypted."' and code_generated='".$code."' order by created_at";
            $points = DB::connection('backoffice')->select($sql);
        }                  
        print_r($encryption);


        // var_dump(json_decode($data)->results[0]->points);
        //  $points = $data['points'];
        // print_r($points);

    }
}
