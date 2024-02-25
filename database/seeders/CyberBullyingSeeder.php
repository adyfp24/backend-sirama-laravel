<?php

namespace Database\Seeders;

use App\Models\BagianSkrinning;
use App\Models\Skrinning;
use App\Models\SoalSkrinning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CyberBullyingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create skrining
        $s_bullying = Skrinning::create([
            'jenis_skrinning' => 'Skrining Bullying', 
            'deskripsi_skrinning' => 'Bullying terjadi ketika seseorang menyakiti atau menakut-nakuti orang lain dengan sengaja dan berulang kali, sedangkan orang yang di-bully sulit untuk membela diri atau melawan'
        ]);

        // create bagian 
        $bs_A = BagianSkrinning::create([
                'nama_bagian' => 'Bagian A',
                'deskripsi_bagian' => 'Bagaimana mereka membully Kamu? (Klik pada jawaban seberapa sering Kamu mengalami bullying)?',
                'urutan_bagian' => 1,
                'skrinning_id' => $s_bullying->id_skrinning
        ]);

        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'cenderung sebagai korban bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying ',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Memanggil saya dengan julukan',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Mengolok-olok saya',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Mengancam menyakiti saya',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Usil pada saya',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Tidak mengizinkan saya bergabung dalam kelompok mereka',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        $bs_B = BagianSkrinning::create([
            'nama_bagian' => 'Bagian B',
            'deskripsi_bagian' => 'Seberapa berat masalah bullying bagi Kamu?',
            'urutan_bagian' => 2,
            'skrinning_id' => $s_bullying->id_skrinning
        ]);
        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'cenderung sebagai korban bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying ',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Membuat saya merasa sakit',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Saya tidak bisa mendapat teman.',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Membuat saya merasa buruk dan sedih',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Membuat saya sulit belajar di sekolah.',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Tidak datang ke sekolah',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Saya memiliki masalah dengan keluarga',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terasa berat',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
    }
}
