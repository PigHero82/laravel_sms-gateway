<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(CustomerSeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GolonganSeeder::class);
        $this->call(RayonSeeder::class);
    }
}
