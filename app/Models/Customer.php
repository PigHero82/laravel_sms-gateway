<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['meter_id', 'name', 'address', 'phone', 'status'];

    static function destroyCustomer($meterId)
    {
        GroupMember::destroyGroupMember($meterId);
        Customer::where('meter_id', $meterId)->delete();
    }

    static function firstCustomer($meterId)
    {
        return Customer::firstWhere('meter_id', $meterId);
    }

    static function getCustomer()
    {
        return Customer::all();
    }

    static function miniGetCustomer()
    {
        return Customer::select('id', 'meter_id', 'name', 'phone')
                        ->where('status', 1)
                        ->get();
    }

    static function storeCustomer($request)
    {
        Customer::create([
            'meter_id'  => $request->meter_id,
            'name'      => $request->name,
            'phone'     => $request->phone,
            'address'   => $request->address
        ]);
    }
}
