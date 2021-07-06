<?php

namespace App\Http\Controllers\APIs;

use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendActivateEden;
use App\Notifications\CreationCompteEden;

class EdenCreatePointsToConvertAPI
{

    public function getCreatePointsToConvert (Request $request)
    {
        //  header("Access-Control-Allow-Origin: * ");

        $code_parrain = $request->input('code1'); //code assure
        $points = $request->input('code2'); //points
           
        $sql = "SELECT * FROM eden_parrain where code_parrain='". $code_parrain."' ";
        
        $data = DB::connection('backoffice')->select($sql);
        
        $eden_parrain = $data[0];

            if(!$eden_parrain){
                $data= [
                    'reponse' => 'non',
                    'message' => 'ce parrain n\'est pas encore enregistré, merci de lui ajouter un filleul'
                ];
                print_r(Response::json($data));
            }else{
                $point_to_convert = $eden_parrain->points_to_convert;
                $point_converted = $eden_parrain->points_converted;
    
                if ($points < 0){
                    $data= [
                        'reponse' => 'non',
                        'message' => 'Merci d\'introduire une valeur positif'
                    ];
                    return Response::json($data);
                }if ($points > $point_to_convert){
                    $data= [
                        'reponse' => 'non',
                        'message' => 'Valeur supèrieure a la valeur intiale'
                    ];
                    print_r(Response::json($data));
                }else{
    
    
                    $new_point_to_convert = $point_to_convert-$points;
                    $new_point_converted = $point_converted+$points;
    
    
                    $myuuid = Uuid::uuid4();
                    $code2 = $myuuid->toString();

                    $sql = "INSERT INTO eden_points_converted (code_assure, code_generated, points, is_validate) VALUES ('".$code_parrain."' , '".$code2."' , '".$points."' , '0')";
         
                    $data = DB::connection('backoffice')->insert($sql);
    
                    $key = "djilai";
                    $encryption_iv = '9567616987456256';
                    $options = 0;
    
                    $encryption = bin2hex(openssl_encrypt($code_parrain,'AES-128-CBC', $key, $options, $encryption_iv));
    
                 

                    $sql = "SELECT * FROM eden_users where code_assure='". $code_parrain."' ";
                    $user = DB::connection('backoffice')->select($sql);

                    $mail = $user[0]->email;
                   
                    //****************Envoi mail ****************/
            
                    if($mail !== ''){
            
                        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            
                        $objet = 'Validation'; // Objet du message
                        
                       
                        $message ="Nous avons reçu une demande de conversion de ".$points." point(s). Merci de valider votre demande \n ".
                        "https://epaiement.allianceassurances.com.dz/public/api/get_points?code1=". $encryption ."&code2=".$code2;
                      
                        $expediteur = 'notif@allianceassurance.com.dz';
                        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
                        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                        $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
                        $headers .= 'From: "Notif"<'.$expediteur.'>'."\n"; // Expediteur
                        $headers .= 'Delivered-to: '.$mail."\n"; // Destinataire     

                        if (mail($mail, $objet, $message, $headers)) // Envoi du message
                        {
                            print_r(true);
                        }
                        else // Non envoyé
                        {
                            $errorMessage = error_get_last();
                            print_r(false);
                        }
            
                    }

                }
                print_r(false);
            }

        }
    }
