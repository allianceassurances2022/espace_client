<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|email:rfc,dns',
            'password' => 'required',
        ]);



        $recap='g-recaptcha-response';
        //dd($request->$recap);

        $response=$request->$recap;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LdA5eMZAAAAAFQaDfKxFdSo7UJbUxyZUQptej5Q',
            'response' => $request->$recap
        );
        $query = http_build_query($data);
        $options = array(
            'http' => array (
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                "Content-Length: ".strlen($query)."\r\n".
                "User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==true) {

            $this->validateLogin($request);
            return

        } else if ($captcha_success->success==false) {

            echo '<script language="javascript" type="text/javascript">';
            echo 'alert(\'Recaptcha incorrect, merci de r\351essayer\');';
            echo 'window.location.replace("login");';
            echo '</script>';

        }


    }

}
