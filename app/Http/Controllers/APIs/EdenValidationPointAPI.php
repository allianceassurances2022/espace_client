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
        
        /*$ciphering = "AES-128-CTR";
  
                // Use OpenSSl Encryption method
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
          
                // Non-NULL Initialization Vector for encryption
                $encryption_iv = '1234567891010101';
          
                // Store the encryption key
                $encryption_key = "azerty";
          
                // Use openssl_encrypt() function to encrypt the data
                $encryption = openssl_encrypt($code_parrain, $ciphering, $encryption_key, $options, $encryption_iv);
        
        $decryption_iv = '1234567891010101';
  
        // Store the decryption key
        $decryption_key = "azerty";
  
        // Use openssl_decrypt() function to decrypt the data
        $code_decrypted=openssl_decrypt ($code_assure, $ciphering, 
                $decryption_key, $options, $decryption_iv);*/

        $key = "djilai";
        $encryption_iv = '9567616987456256';
        $options = 0;
        $code_decrypted=openssl_decrypt(hex2bin($code_assure),'AES-128-CBC',$key, $options, $encryption_iv);
          

        $sql = "SELECT points FROM eden_points_converted where code_assure='". $code_decrypted."' order by created_at";
        $points_1 = DB::connection('backoffice')->select($sql);
        $points = $points_1[0]->points;

        $eden_parrain = Eden_parrain:: where('code_parrain',$code_decrypted)->first();

        if(!is_null($eden_parrain)) {

            $point_to_convert = $eden_parrain->points_to_convert ;
            $point_converted = $eden_parrain->points_to_convert ;
            
            $new_point_to_convert = $point_to_convert-$points;
            $new_point_converted = $point_converted+$points;

            $sql = "UPDATE eden_parrain SET points_to_convert='".$new_point_to_convert."',  points_to_convert='".$new_point_converted."' where code_parrain='". $code_decrypted."'";
            $update = DB::connection('backoffice')->update($sql);
          
            $sql = "UPDATE eden_points_converted SET is_validate='1' where code_assure='". $code_decrypted."' and code_generated='".$code."' order by created_at";
            $update = DB::connection('backoffice')->update($sql);

        }                  
        print_r($update);


        // var_dump(json_decode($data)->results[0]->points);
        //  $points = $data['points'];
        // print_r($points);

    }
}
