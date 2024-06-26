<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            // SkrinningSeeder::class,
            // TestingSkrinning::class
            BullyingSeeder::class,
            CyberBullyingSeeder::class,
            EmpatiSeeder::class,
            EfikasiDiriSeeder::class,
            PrososialSeeder::class,
            KebaikanTableSeeder::class
        ]);
    }
}
