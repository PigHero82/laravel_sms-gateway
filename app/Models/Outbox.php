<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    use HasFactory;

    protected $table = 'outboxes';
    protected $fillable = ['customer_id', 'phone', 'message', 'status'];

    static function firstOutbox($id)
    {
        return Outbox::select('outboxes.*', 'customers.name')
                        ->join('customers', 'outboxes.customer_id', 'customers.customer_id')
                        ->where('outboxes.id', $id)
                        ->first();
    }

    static function getOutbox()
    {
        return Outbox::select('outboxes.*', 'customers.name')
                        ->join('customers', 'outboxes.customer_id', 'customers.customer_id')
                        ->get();
    }

    static function miniGetOutbox()
    {
        return Outbox::select('outboxes.id', 'customers.name', 'outboxes.message')
                        ->join('customers', 'outboxes.customer_id', 'customers.customer_id')
                        ->where('status', 1)
                        ->get();
    }

    static function storeOutbox($customerId, $phone, $message)
    {
        Outbox::create([
            'customer_id'   => $customerId,
            'phone'         => $phone,
            'message'       => $message,
        ]);
    }
}
