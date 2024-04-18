<?php

namespace Database\Seeders;

use App\Models\BagianSkrinning;
use App\Models\BagianSkrinningUser;
use App\Models\Skrinning;
use App\Models\SoalSkrinning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BullyingSeeder extends Seeder
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
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Merusak barang-barang saya',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Menyerang saya',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Tidak ada yang mau berbicara dengan saya ',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Menulis hal-hal buruk tentang saya',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Mengatakan hal-hal yang buruk di belakang saya',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Mendorong atau menjatuhkan saya',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create bagian
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

        // create bagian 
        $bs_C = BagianSkrinning::create([
            'nama_bagian' => 'Bagian C',
            'deskripsi_bagian' => 'Kamu pernah melihat siswa lain dibully. Bagaimana siswa tersebut dibully? (Klik seberapa sering siswa yang Kamu lihat itu dibully)',
            'urutan_bagian' => 3,
            'skrinning_id' => $s_bullying->id_skrinning
        ]);

        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'cenderung melihat kejadian tidak menyenangkan yaitu bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying  ',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Memanggilnya dengan julukan',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
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
            'soal' => 'Mengolok-olok dia',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
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
            'soal' => 'Mengancam menyakitinya',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
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
            'soal' => 'Mempermainkannya',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
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
            'soal' => 'Tidak mengizinkannya bergabung dalam kelompok ',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
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
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Merusak barang-barangnya',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Menyerangnya',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Tidak ada yang mau berbicara dengannya',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Menulis hal-hal buruk tentang dia',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Mengatakan hal-hal yang kejam di belakang dia',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Mendorong atau menjatuhkan dia',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_C->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        
        // create bagian 
        $bs_D = BagianSkrinning::create([
            'nama_bagian' => 'Bagian D',
            'deskripsi_bagian' => 'Bagaimana Kamu melakukan bullying terhadap seseorang? (Klik seberapa sering Kamu melakukan bullying pada siswa lain)',
            'urutan_bagian' => 4,
            'skrinning_id' => $s_bullying->id_skrinning
        ]);

        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'cenderung sebagai pelaku bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Memanggilnya dengan julukan',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
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
            'soal' => 'Mengolok-olok dia',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
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
            'soal' => 'Mengancam menyakitinya',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
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
            'soal' => 'Mempermainkannya',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
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
            'soal' => 'Tidak mengizinkannya bergabung dalam kelompok ',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
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
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Merusak barang-barangnya',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Menyerangnya',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Tidak mengajaknya berbicara',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Menulis hal-hal buruk tentang dia',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Mengatakan hal-hal yang kejam di belakang dia',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Mendorong atau menjatuhkan dia',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_D->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        // create bagian 
        $bs_E = BagianSkrinning::create([
            'nama_bagian' => 'Bagian E',
            'deskripsi_bagian' => 'Di bagian ini, Sobat RAMA akan ditanya mengenai pendapatmu tentang bullying. Seberapa setujukah Sobat RAMA dengan setiap kalimat ini?',
            'urutan_bagian' => 5,
            'skrinning_id' => $s_bullying->id_skrinning
        ]);

        //create hasil bagian
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 43,
            'jangkauan_akhir' => 70,
            'hasil' => 'memahami bahwa mencegah bullying adalah bagian tanggung jawab siswa. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying', 
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 14,
            'jangkauan_akhir' => 42,
            'hasil' => 'Yuk tingkatkan pengetahuan tentang bullying dan pencegahannya melalui Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Kebanyakan orang yang mengalami perundungan memang menginginkannya.',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Perundungan adalah masalah bagi anak-anak.',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Pelaku perundungan adalah orang yang populer.',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Saya tidak menyukai pelaku perundungan.',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Saya takut kepada pelaku perundungan di sekolah saya.',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Perundungan itu bagus untuk anak-anak yang lemah.',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Pelaku perundungan menyakiti anak-anak.',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Saya mau berteman dengan pelaku perundungan.',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Saya bisa memahami mengapa seseorang melakukan perundungan kepada anak lain.',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Menurut saya, pelaku perundungan harus dihukum.',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Pelaku perundungan tidak bermaksud menyakiti siapa pun',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        $soal12 = SoalSkrinning::create([
            'soal' => 'Pelaku perundungan membuat anak-anak merasa resah.',
            'no_soal' => 12,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        $soal13 = SoalSkrinning::create([
            'soal' => 'Saya merasa kasihan kepada anak-anak yang mengalami perundungan',
            'no_soal' => 13,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        $soal14 = SoalSkrinning::create([
            'soal' => 'Mengalami perundungan bukanlah masalah yang serius.',
            'no_soal' => 14,
            'bagian_skrinning_id' => $bs_E->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Salah',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Bisa benar, bisa salah',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Benar sekali',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
    }
}
