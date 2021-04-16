<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Golongan;
use App\Models\Group;
use App\Models\Outbox;
use App\Models\Payment;
use App\Models\Rayon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outboxes = Outbox::getOutbox();
        return view('pages.pesan.sms-keluar', compact('outboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['type' => 'required|numeric']);
        $type = $request->type;

        if ($type == 1) {
            $request->validate([
                'message'   => 'required',
                'meter_id'  => 'required|numeric'
            ]);

            $customer = Customer::firstCustomer($request->meter_id);

            $message = $request->message;
            $message = (strpos($message, '[no_meter]') !== false) ? str_replace('[no_meter]', $customer->meter_id, $message) : $message ;
            $message = (strpos($message, '[nama]') !== false) ? str_replace('[nama]', $customer->name, $message) : $message ;
            $message = (strpos($message, '[alamat]') !== false) ? str_replace('[alamat]', $customer->address, $message) : $message ;
            $message = (strpos($message, '[no_telepon]') !== false) ? str_replace('[no_telepon]', $customer->phone, $message) : $message ;
            $message = (strpos($message, '[tagihan_terakhir]') !== false) ? str_replace('[tagihan_terakhir]', $customer->last_month, $message) : $message ;
            $message = (strpos($message, '[tagihan_saat_ini]') !== false) ? str_replace('[tagihan_saat_ini]', $customer->this_month, $message) : $message ;
            $message = (strpos($message, '[jumlah_tagihan]') !== false) ? str_replace('[jumlah_tagihan]', $customer->usage, $message) : $message ;
            $message = (strpos($message, '[biaya_tagihan]') !== false) ? str_replace('[biaya_tagihan]', $customer->tariff, $message) : $message ;
            $message = (strpos($message, '[denda]') !== false) ? str_replace('[denda]', $customer->penalty, $message) : $message ;
            $message = (strpos($message, '[bulan_tagihan]') !== false) ? str_replace('[bulan_tagihan]', $customer->billing_month, $message) : $message ;

            Outbox::storeOutbox($customer->meter_id, $customer->phone, $message);
            return redirect()->route('pesan.index')->with('success', 'Sedang mengirim pesan');

        } else if ($type == 2) {
            $request->validate([
                'message'   => 'required',
                'group_id'  => 'required|numeric'
            ]);

            $group = Group::firstGroup($request->group_id);

            foreach ($group['member'] as $key => $value) {
                $message = $request->message;
                $message = (strpos($message, '[no_meter]') !== false) ? str_replace('[no_meter]', $value['meter_id'], $message) : $message ;
                $message = (strpos($message, '[nama]') !== false) ? str_replace('[nama]', $value['name'], $message) : $message ;
                $message = (strpos($message, '[alamat]') !== false) ? str_replace('[alamat]', $value['address'], $message) : $message ;
                $message = (strpos($message, '[no_telepon]') !== false) ? str_replace('[no_telepon]', $value['phone'], $message) : $message ;
                $message = (strpos($message, '[tagihan_terakhir]') !== false) ? str_replace('[tagihan_terakhir]', $value['last_month'], $message) : $message ;
                $message = (strpos($message, '[tagihan_saat_ini]') !== false) ? str_replace('[tagihan_saat_ini]', $value['this_month'], $message) : $message ;
                $message = (strpos($message, '[jumlah_tagihan]') !== false) ? str_replace('[jumlah_tagihan]', $value['usage'], $message) : $message ;
                $message = (strpos($message, '[biaya_tagihan]') !== false) ? str_replace('[biaya_tagihan]', $value['tariff'], $message) : $message ;
                $message = (strpos($message, '[denda]') !== false) ? str_replace('[denda]', $value['penalty'], $message) : $message ;
                $message = (strpos($message, '[bulan_tagihan]') !== false) ? str_replace('[bulan_tagihan]', $value['billing_month'], $message) : $message ;

                Outbox::storeOutbox($value['meter_id'], $value['phone'], $message);
            }

            return redirect()->route('pesan.index')->with('success', 'Sedang mengirim pesan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Outbox::firstOutbox($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Outbox $outbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outbox $outbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outbox $outbox)
    {
        //
    }

    function base64UrlEncode($text)
    {
        return str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($text)
        );
    }

    function getToken()
    {
        // get the local secret key
        $secret = env('JWT_SECRET');

        // Create the token header
        $header = json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]);

        // Create the token payload
        $payload = json_encode([
            'user' => 'layananpel',
            'pass' => '038e3e4ad74453a72153fbbf32a60573',
            'tanggal' => date('Y-m-d H:i:s')
        ]);
        // echo date('d-m-Y h:i:s');
        // Encode Header
        $base64UrlHeader = $this->base64UrlEncode($header);

        // Encode Payload
        $base64UrlPayload = $this->base64UrlEncode($payload);

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        return $jwt;
    }

    public function getApi($golongan, $rayon, $tahun, $bulan)
    {
        $golongans = Golongan::getGolongan();
        $rayons = Rayon::getRayon();

        $kode_gol = $golongan;
        $kode_rayon = '0101';

        $tagihan = [];
        $tahun = now()->year;
        $bulan = (now()->month <= 9) ? "0".now()->month : now()->month ;
        $periode = $tahun . "03";

        // foreach ($golongans as $key => $golongan) {
            foreach ($rayons as $key => $rayon) {
                // $response = '';
                // $data = [];
                $response = Http::withHeaders(['Authorization' => 'Bearer '.$this->getToken()])
                                // ->get('https://apikabbangli.limasakti.co.id/api/layanan-datapelanggan/'.$golongan->kode_gol.'/'.$rayon->kode_rayon);
                                ->get('https://apikabbangli.limasakti.co.id/api/layanan-datapelanggan/'.$kode_gol.'/'.$rayon->kode_rayon);
                $data = $response->json();

                if ($data['mssg'] == 'oke') {
                    foreach ($data['data'] as $key => $value) {
                        return $value;
                        if ($value['periode'] == $periode) {
                            $api = [];
                            $year = substr($value['periode'], 0, 4);
                            $month = substr($value['periode'], 4, 2);

                            $api['meter_id']        = $value['nosamb'];
                            $api['last_month']      = $value['stanlalu'];
                            $api['this_month']      = $value['stanskrg'];
                            $api['usage']           = $value['pakai'];
                            $api['tariff']          = $value['tagihan'];
                            $api['penalty']         = $value['denda'];
                            $api['billing_month']   = $year.'-'.$month.'-01';
                            $api['created_at']      = now();
                            $api['updated_at']      = now();

                            // $tagihan[] = $api;
                            $tagihan[] = $value;
                        }
                    }
                }
                // Payment::insert($tagihan);
            }
        // }
        // $datas['golongan'] = $kode_gol;
        $datas['count'] = count($tagihan);
        $datas['tagihan'] = $tagihan;
        return $datas;
        return 'sukses';
    }
}
