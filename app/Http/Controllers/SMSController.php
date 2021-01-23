<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
            'message'       => 'required',
            'customer_id'   => 'required|numeric'
        ]);

        $customer = Customer::firstCustomer($request->customer_id);

        $message = $request->message;
        $message = (strpos($message, '[no_meter]') !== false) ? str_replace('[no_meter]', $customer->meter_no, $message) : $message ;
        $message = (strpos($message, '[id_pelanggan]') !== false) ? str_replace('[id_pelanggan]', $customer->customer_id, $message) : $message ;
        $message = (strpos($message, '[nama]') !== false) ? str_replace('[nama]', $customer->name, $message) : $message ;
        $message = (strpos($message, '[alamat]') !== false) ? str_replace('[alamat]', $customer->address, $message) : $message ;
        $message = (strpos($message, '[no_telepon]') !== false) ? str_replace('[no_telepon]', $customer->phone, $message) : $message ;

        $response = SMS::send($this->userKey, $this->passKey, $customer->phone, $message);
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        
        SMS::updateCredit($this->userKey, $this->passKey);

        if ($statusCode == 200 || $statusCode == 201) {
            if ($response['status'] == 1) {
                return back()->with('success', 'Pesan terkirim ke ' . $customer->name);
            } else {
                return $response;
            }
        } else {
            return $response;
        }
    }

    public function index()
    {
        $customer = Customer::miniGetCustomer();

        return view('pages.home.pesan', compact('customer'));
    }
}
