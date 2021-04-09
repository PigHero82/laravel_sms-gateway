<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $golongan = [
            '2C',
            '1C',
            '1D',
            '2D',
            '2E',
            '4C',
            '4D',
            '1A',
            '1B',
            '2A',
            '2B',
            '3A',
            '3B',
            '4A',
            '4B',
            '1A',
            '1B',
            '1C',
            '1D',
            '2A',
            '2B',
            '2C',
            '2D',
            '2E',
            '3A',
            '3B',
            '4A',
            '4B',
            '4C',
            '4D'
        ];

        foreach ($golongan as $key => $value) {
            Golongan::insert([
                'kode_gol'      => $value,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
