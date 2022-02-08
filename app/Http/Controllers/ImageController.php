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
        //dd($response);

        //send email to client with join url
        $email = "shariti@allianceassurances.com.dz";

        // $numero_police = str_replace(' ', '', $response['']);
        $lien_client = $response['join_url'];
        $information = "Expertise Zoom meeting";
        // $this->envoiMail($email,  $lien_client, $information);



        //   return redirect($response['start_url']);
        return view('zoom.meeting');
    }
}
