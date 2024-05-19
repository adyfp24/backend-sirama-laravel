<?php

namespace Database\Seeders;

use App\Models\Kebaikan;
use Illuminate\Database\Seeder;

class KebaikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kebaikan::create([
            'nama_kebaikan' => 'Berpamitan kepada orang tua',
            'minggu' => 1
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Berdoa sebelum belajar',
            'minggu' => 1
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Menyapa kepada teman',
            'minggu' => 1
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Berbagi dengan teman',
            'minggu' => 2
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Bersedekah atau berinfak',
            'minggu' => 2
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Merapikan tempat tidur sendiri',
            'minggu' => 2
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Meminta ijin ketika menggunakan barang temannya',
            'minggu' => 3
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Menyapa guru',
            'minggu' => 3
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Tidak membuang sampah sembarangan',
            'minggu' => 3
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Mampu antri dengan baik',
            'minggu' => 4
        ]);

        Kebaikan::create([
            'nama_kebaikan' => 'Membantu teman yang kesulitan dalam hal baik',
            'minggu' => 4
        ]);
        
        Kebaikan::create([
            'nama_kebaikan' => 'Tidak mengejek teman di sekolah',
            'minggu' => 4
        ]);
            
    }
}
