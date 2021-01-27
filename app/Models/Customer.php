<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['meter_no', 'customer_id', 'name', 'address', 'phone', 'type', 'status'];

    static function destroyCustomer($customerId)
    {
        GroupMember::destroyGroupMember($customerId);
        Customer::where('customer_id', $customerId)->delete();
    }

    static function firstCustomer($customerId)
    {
        return Customer::firstWhere('customer_id', $customerId);
    }

    static function getCustomer()
    {
        return Customer::all();
    }

    static function miniGetCustomer()
    {
        return Customer::select('id', 'customer_id', 'name', 'phone')
                        ->where('status', 1)
                        ->get();
    }

    static function storeCustomer($request)
    {
        Customer::create([
            'meter_no'      => $request->meter_no,
            'customer_id'   => $request->customer_id,
            'name'          => $request->name,
            'phone'         => $request->phone,
            'address'       => $request->address
        ]);
    }
}
