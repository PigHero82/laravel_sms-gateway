<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['meter_no', 'customer_id', 'name', 'address', 'phone', 'type', 'status'];

    static function firstCustomer($id)
    {
        return Customer::firstWhere('customer_id', $id);
    }

    static function getCustomer()
    {
        return Customer::all();
    }

    static function miniGetCustomer()
    {
        return Customer::select('id', 'customer_id', 'name', 'phone')->get();
    }
}
