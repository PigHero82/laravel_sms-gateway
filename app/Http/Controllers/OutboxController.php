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

            Outbox::storeOutbox($customer->customer_id, $customer->phone, $message);
            return redirect()->route('pesan.index')->with('success', 'Sedang mengirim pesan');

        } else if ($type == 2) {
            $request->validate([
                'message'   => 'required',
                'group_id'  => 'required|numeric'
            ]);
    
            $group = Group::firstGroup($request->group_id);
    
            foreach ($group['member'] as $key => $value) {
                $message = $request->message;
                $message = (strpos($message, '[no_meter]') !== false) ? str_replace('[no_meter]', $value['meter_no'], $message) : $message ;
                $message = (strpos($message, '[id_pelanggan]') !== false) ? str_replace('[id_pelanggan]', $value['customer_id'], $message) : $message ;
                $message = (strpos($message, '[nama]') !== false) ? str_replace('[nama]', $value['name'], $message) : $message ;
                $message = (strpos($message, '[alamat]') !== false) ? str_replace('[alamat]', $value['address'], $message) : $message ;
                $message = (strpos($message, '[no_telepon]') !== false) ? str_replace('[no_telepon]', $value['phone'], $message) : $message ;
        
                Outbox::storeOutbox($value['customer_id'], $value['phone'], $message);
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
