<?php

namespace App\Console\Commands;

use App\Models\Golongan;
use App\Models\Payment;
use App\Models\Rayon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getData:lastDayOfMonth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from pdam api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $golongans = Golongan::getGolongan();
        $rayons = Rayon::getRayon();

        $tagihan = [];
        $tahun = now()->year;
        $bulan = (now()->month <= 9) ? "0".now()->month : now()->month ;
        // $periode = $tahun . $bulan;
        $periode = $tahun . '02';

        foreach ($golongans as $key => $golongan) {
            foreach ($rayons as $key => $rayon) {
                $response = Http::withHeaders(['Authorization' => 'Bearer '.$this->getToken()])
                                ->get('https://apikabbangli.limasakti.co.id/api/layanan-datapelanggan/'.$golongan->kode_gol.'/'.$rayon->kode_rayon);
                $data = $response->json();

                if ($data['mssg'] == 'oke') {
                    foreach ($data['data'] as $key => $value) {
                        if ($value['periode'] == $periode) {
                            // $api = [];
                            $year = substr($value['periode'], 0, 4);
                            $month = substr($value['periode'], 4, 2);

                            Payment::firstOrCreate(
                                [
                                    'meter_id'      => $value['nosamb'],
                                    'billing_month' => $year.'-'.$month.'-01'
                                ], [
                                    'meter_id'      => $value['nosamb'],
                                    'last_month'    => $value['stanlalu'],
                                    'this_month'    => $value['stanskrg'],
                                    'usage'         => $value['pakai'],
                                    'tariff'        => $value['tagihan'],
                                    'penalty'       => $value['denda'],
                                    'billing_month' => $year.'-'.$month.'-01',
                                    'created_at'    => now(),
                                    'updated_at'    => now()
                                ]
                            );

                            // $api['meter_id']        = $value['nosamb'];
                            // $api['last_month']      = $value['stanlalu'];
                            // $api['this_month']      = $value['stanskrg'];
                            // $api['usage']           = $value['pakai'];
                            // $api['tariff']          = $value['tagihan'];
                            // $api['penalty']         = $value['denda'];
                            // $api['billing_month']   = $year.'-'.$month.'-01';
                            // $api['created_at']      = now();
                            // $api['updated_at']      = now();

                            // $tagihan[] = $api;
                        }
                    }
                }

                // Payment::insert($tagihan);
            }
        }
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
            'user' => env('JWT_USER'),
            'pass' => env('JWT_PASS'),
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

    function base64UrlEncode($text)
    {
        return str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($text)
        );
    }
}
