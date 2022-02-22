<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index()
    {
        return view('zoom.index');
    }
    public function zoomMeeting(Request $request)
    {
        // dd($request);
        /*    $url = 'https://demo.adexcloud.dz/api/zoommeeting/1';
        $response = Http::contentType("application/json")->send('GET', $url)->json();
        dd($response);

        $client = new Client(['base_uri' => 'https://foo.com/api/']);
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'test');

*/
        $client = new \GuzzleHttp\Client();
        $request = $client->request('POST', 'https://demo.adexcloud.dz/api/zoommeeting/1');
        $response = json_decode($request->getBody(), true);
       // dd($response);

        //send email to client with join url
        $email = "shariti@allianceassurances.com.dz";

        // $numero_police = str_replace(' ', '', $response['']);
        $lien_client = $response['join_url'];
        $information = "Expertise Zoom meeting";
        //  $this->envoiMail($email,  $lien_client, $information);



        //   return redirect($response['start_url']);
        return view('zoom.meeting');
    }
    public function envoiMail($email, $lien_client, $information)
    {
        if (($email !== '') && ($email !== null)) {

            //   $template_file = "../../../resources/views/layouts/mail_template_zoom.php";
            $template_file = app_path('/Http/Controllers/mail_template_zoom.php');
            $destinataire = $email;
            $logo_url = public_path('/assets/img/logo_dark.svg');

            //$logo_url = base_path('public/assets/img/logo_dark.svg');			
            //$username = Auth::user()->name;
            //$username2 = Auth::user()->prenom;

            $swap_var = array(
                "{SITE_ADDR}" => "https://allianceassurances.com.dz",
                "{EMAIL_LOGO}" => "https://epaiement.allianceassurances.com.dz/public/assets/img/logo_dark.svg",
                //"{EMAIL_LOGO}" => $logo_url,
                "{EMAIL_TITLE}" => "Rejoindre la réunion ZOOM",
                // "{TO_NAME}" => ''. $username . ' '. $username2.'' ,
                //"{TO_EMAIL}" => Auth::user()->email ,
            );

            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $objet = 'Création sinistre'; // Objet du message        

            $headers = 'From: Alliance' . "\r\n" .
                'Reply-To: webmaster@allianceassurances.com.dz' . "\r\n" .
                'X-Mailer: PHP/';
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            //  $message = 'Votre sinistre à bien été enregistré sous le numéro de police :' . $numero_police . '\n' . $information;

            if (file_exists($template_file)) {
                $email_message = file_get_contents($template_file);
            } else {
                die("unable to locate the template file");
            }

            // search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                    $email_message = str_replace($key, $swap_var[$key], $email_message);
            }

            $success = mail($destinataire, $objet,  $email_message, $headers);

            if (!$success) {
                $errorMessage = error_get_last();
                echo $errorMessage;
                // echo "Votre message n'a pas pu être envoyé";

            }
        }
    }
}
