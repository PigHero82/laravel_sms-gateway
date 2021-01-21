<?php

namespace App\Models;

use Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class SMS extends Model
{
    use HasFactory;

    static function credit($userKey, $passKey)
    {
        $response = Http::get('https://console.zenziva.net/api/balance/?userkey=' . $userKey . '&passkey=' . $passKey);
    	$data = $response->json();

		return $data;
    }

    static function send($userKey, $passKey, $phone, $message)
    {
        $url = 'https://console.zenziva.net/reguler/api/sendsms/';

        return $response = Http::post($url, [
            'userkey'   => $userKey,
            'passkey'   => $passKey,
            'to'        => $phone,
            'message'   => $message
        ]);
    }
}
