<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    use HasFactory;

    protected $table = 'outboxes';
    protected $fillable = ['customer_id', 'phone', 'message'];

    static function firstOutbox($id)
    {
        return Outbox::select('outboxes.*', 'customers.name')
                        ->join('customers', 'outboxes.customer_id', 'customers.customer_id')
                        ->whereId($id)
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
                        ->get();
    }
}
