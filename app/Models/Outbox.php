<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    use HasFactory;

    protected $table = 'outboxes';
    protected $fillable = ['meter_id', 'phone', 'message', 'status'];

    static function firstOutbox($id)
    {
        return Outbox::select('outboxes.*', 'customers.name')
                        ->join('customers', 'outboxes.meter_id', 'customers.meter_id')
                        ->where('outboxes.id', $id)
                        ->first();
    }

    static function getOutbox()
    {
        return Outbox::select('outboxes.*', 'customers.name')
                        ->join('customers', 'outboxes.meter_id', 'customers.meter_id')
                        ->get();
    }

    static function miniGetOutbox()
    {
        return Outbox::select('outboxes.id', 'customers.name', 'outboxes.message')
                        ->join('customers', 'outboxes.meter_id', 'customers.meter_id')
                        ->where('outboxes.status', 1)
                        ->get();
    }

    static function storeOutbox($meterId, $phone, $message)
    {
        Outbox::create([
            'meter_id'  => $meterId,
            'phone'     => $phone,
            'message'   => $message,
        ]);
    }
}
