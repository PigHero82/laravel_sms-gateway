<?php

namespace App\Http\Controllers;

use App\Models\SMS;
use Config;
use Illuminate\Http\Request;

class SMSController extends Controller
{

    public $userKey;
    public $passKey;

    public function __construct()
    {
        $this->userKey = Config::get('app.zenziva.userKey', 'default');
        $this->passKey = Config::get('app.zenziva.passKey', 'default');
    }

    public function credit()
    {
        return SMS::credit($this->userKey, $this->passKey);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message'   => 'required',
            'phone'     => 'required|numeric'
        ]);

        $response = SMS::send($this->userKey, $this->passKey, $request->phone, $request->message);

        return $response;
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
    }
}
