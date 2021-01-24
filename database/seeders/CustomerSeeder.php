<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            'meter_no'      => 12345678901,
            'customer_id'   => 12398921234,
            'name'          => 'Ida Bagus Komang Darma Wiryanata',
            'address'       => 'Denpasar',
            'phone'         => '085339234034',
            'type'          => 1,
            'status'        => 1,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        Customer::insert([
            'meter_no'      => 11237490213,
            'customer_id'   => 23748234693,
            'name'          => 'Ida Bagus Kadek Darma Wiryatama',
            'address'       => 'Denpasar',
            'phone'         => '085156671663',
            'type'          => 1,
            'status'        => 1,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
