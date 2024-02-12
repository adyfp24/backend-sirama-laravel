<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SkrinningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skrinnings')->insert([
            'jenis_skrinning' => 'Bullying', 
            'deskripsi_skrinning' => 'Bullying terjadi ketika seseorang menyakiti atau menakut-nakuti orang lain dengan sengaja dan berulang kali, sedangkan orang yang di-bully sulit untuk membela diri atau melawan '
        ]);

        DB::table('skrinnings')->insert([
            'jenis_skrinning' => 'Cyberbullying', 
            'deskripsi_skrinning' => 'Perundungan di dunia maya (cyberbullying) adalah ketika seseorang secara berulang melecehkan, menindas, atau mengolok-olok orang lain (dengan sengaja untuk menyakiti mereka) di dunia maya atau saat menggunalan ponsel atau perangkat elektronik lainnya'
        ]);

        DB::table('skrinnings')->insert([
            'jenis_skrinning' => 'Empati', 
            'deskripsi_skrinning' => 'Ketika seseorang sedang kesal..apa yang akan Kamu lakukan? Apa yang akan Kamu rasakan? Bagaimana perasaan Kamu? Tandai pilihan Kamu yang menurut Kamu paling sesuai dengan dirimu. Tidak ada jawaban yang menunjukkan benar atau salah sehingga Kamu dapat menjawabnya secara jujur. '
        ]);

        DB::table('skrinnings')->insert([
            'jenis_skrinning' => 'Efikasi Diri', 
            'deskripsi_skrinning' => ''
        ]);

        DB::table('skrinnings')->insert([
            'jenis_skrinning' => 'Prososial', 
            'deskripsi_skrinning' => ''
        ]);
    }
}
