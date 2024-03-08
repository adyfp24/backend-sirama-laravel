<?php

namespace Database\Seeders;

use App\Models\BagianSkrinning;
use App\Models\Skrinning;
use App\Models\SoalSkrinning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpatiSeeder extends Seeder
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
            'jenis_skrinning' => 'Skrining Empati', 
            'deskripsi_skrinning' => 'Ketika seseorang sedang kesal.. apa yang akan Kamu lakukan? Apa yang akan Kamu rasakan? Bagaimana perasaan Kamu? Tandai pilihan Kamu yang menurut Kamu paling sesuai dengan dirimu. Tidak ada jawaban yang menunjukkan benar atau salah sehingga Kamu dapat menjawabnya secara jujur. '
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
            'jangkauan_awal' => 29,
            'jangkauan_akhir' => 42,
            'hasil' => 'Memiliki ketrampilan memahami perasaan diri sendiri dan orang lain dengan baik. Hargai Perbedaan, Jaga Hati, Lisan, dan Laku kepada orang lain sebagai langkah cegah bullying di sekitar kita', 
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 14,
            'jangkauan_akhir' => 28,
            'hasil' => 'Tingkatkan ketrampilan memahami perasaan diri sendiri dan orang lain. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Jika ibu saya senang, saya juga merasa senang',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Jika teman saya merasa sedih, saya ingin melakukan sesuatu untuk membuatnya merasa lebih baik',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Jika teman saya menangis, seringkali saya memahami apa yang telah terjadi',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Ketika seorang teman menangis, saya juga ikut menangis',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Jika teman saya bertengkar, saya berusaha membantu',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Jika seseorang di keluarga saya sedih, saya merasa sangat tidak enak',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Ketika teman saya marah, saya cenderung tahu alasannya kenapa',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Jika seorang teman sedih, saya suka menghiburnya',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Saya merasa tidak nyaman ketika dua orang bertengkar',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Saya ingin semua orang merasa bahagia',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Saya sering merasa sedih ketika menonton film yang sedih',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal12 = SoalSkrinning::create([
            'soal' => 'Saya ingin membantu ketika seorang teman marah',
            'no_soal' => 12,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       

        $soal13 = SoalSkrinning::create([
            'soal' => 'Jika teman saya sedih, saya paling mengerti alasannya',
            'no_soal' => 13,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       

        $soal14 = SoalSkrinning::create([
            'soal' => 'Ketika seorang teman kesal, saya juga merasa kesal',
            'no_soal' => 14,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak benar',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang benar',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering benar',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
    }
}
