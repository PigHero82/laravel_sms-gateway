<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use App\Models\Outbox;
use Illuminate\Http\Request;

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
}
