<?php

namespace Database\Seeders;

use App\Models\Rayon;
use Illuminate\Database\Seeder;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rayon = [
            '0101',
            '0102',
            '0103',
            '0104',
            '0801',
            '0210',
            '0211',
            '0317',
            '0318',
            '0319',
            '0320',
            '0406',
            '0507',
            '0615',
            '0716',
            '0717',
            '0812',
            '0813',
            '0814',
            '0922',
            '1024',
            '1131',
            '1228',
            '1305',
            '1323',
            '1324',
            '1325',
            '1326',
            '1327',
            '1408'
        ];

        foreach ($rayon as $key => $value) {
            Rayon::insert([
                'kode_rayon'    => $value,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
