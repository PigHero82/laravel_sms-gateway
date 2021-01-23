<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::insert([
            'name'          => 'credit',
            'description'   => '5000',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
