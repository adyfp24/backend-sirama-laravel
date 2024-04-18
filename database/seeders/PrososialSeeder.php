<?php

namespace Database\Seeders;

use App\Models\BagianSkrinning;
use App\Models\Skrinning;
use App\Models\SoalSkrinning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrososialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create skrining
        $s_empati = Skrinning::create([
            'jenis_skrinning' => 'Skrining Kemampuan Prososial', 
            'deskripsi_skrinning' => ''
        ]);

        // create bagian 
        $bs_A = BagianSkrinning::create([
            'nama_bagian' => 'Bagian Skrining',
            'deskripsi_bagian' => '',
            'urutan_bagian' => 1,
            'skrinning_id' => $s_empati->id_skrinning
        ]);

        //create hasil bagian
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 6,
            'jangkauan_akhir' => 10,
            'hasil' => 'memiliki kemampuan menjalin pertemanan dengan baik. Hargai Perbedaan, Jaga Hati, Lisan, dan Laku kepada orang lain sebagai langkah cegah bullying di sekitar kita', 
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 0,
            'jangkauan_akhir' => 5,
            'hasil' => 'tingkatkan kemampuan menjalin pertemanan. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu ',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Saya berusaha bersikap baik kepada orang lain. Saya peduli dengan perasaan mereka',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Agak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Kalau saya memiliki CD atau makanan saya biasanya berbagi dengan orang lain',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Agak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Saya selalu siap menolong jika ada orang terluka, kecewa, atau merasa sakit',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Agak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Saya bersikap baik pada anak-anak atau remaja yang lebih muda dari saya',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Agak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Saya sering menawarkan diri untuk membantu orang lain, orang tua, guru atau anak-anak',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Agak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
    }
}
