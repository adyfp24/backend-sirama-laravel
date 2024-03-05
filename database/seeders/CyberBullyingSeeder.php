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
        $s_Cyberbully = Skrinning::create([
            'jenis_skrinning' => 'Skrining CyberBullying', 
            'deskripsi_skrinning' => 'Perundungan di dunia maya (cyberbullying) adalah ketika seseorang secara berulang melecehkan, menindas, atau mengolok-olok orang lain (dengan sengaja untuk menyakiti mereka) di dunia maya atau saat menggunalan ponsel atau perangkat elektronik lainnya'
        ]);

        // create bagian 
        $bs_A = BagianSkrinning::create([
                'nama_bagian' => 'Bagian A',
                'deskripsi_bagian' => '',
                'urutan_bagian' => 1,
                'skrinning_id' => $s_Cyberbully->id_skrinning
        ]);

        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'telah mengalami cyberbullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu ',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'telah menjadi Sobat RAMA yang tidak mengalami cyberbullying. Pertahankan: Hargai Perbedaan, Jaga Hati, Lisan, dan Laku kepada teman atau lainnya',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting komentar yang jahat atau menyakitkan tentang saya secara online',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting gambar yang jahat atau menyakitkan tentang saya secara online',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting video yang jahat atau menyakitkan tentang saya secara online',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Seseorang membuat halaman web yang jahat atau menyakitkan tentang saya secara online',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Seseorang menyebarkan rumor tentang saya secara online',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        // create soal
        $soal6 = SoalSkrinning::create([
            'soal' => 'Seseorang mengancam untuk menyakiti saya melalui pesan teks telepon seluler',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Seseorang mengancam untuk menyakiti saya secara online',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Seseorang berpura-pura menjadi saya secara online dan bertindak dengan cara yang jahat atau menyakitkan kepada saya',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting julukan atau komentar yang menghina tentang ras atau warna kulit saya secara online',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting  julukan, komentar, atau isyarat yang jahat yang bermakna seksual tentang saya secara online',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Seseorang memposting julukan atau komentar yang jahat tentang agama saya secara online',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        $bs_B = BagianSkrinning::create([
            'nama_bagian' => 'Bagian B',
            'deskripsi_bagian' => '',
            'urutan_bagian' => 2,
            'skrinning_id' => $s_Cyberbully->id_skrinning
        ]);
        //create hasil bagian
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'telah terlibat cyberbullying. Belajar Yuk di fitur-fitur edukasi di Aplikasi SIRAMA atau layanan Tanya Ahli. Semoga Membantu Sobat RAMA terbebas dari cyberbullying',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'telah menjadi Sobat RAMA yang tidak terlibat dengan cyberbullying. Pertahankan Hargai Perbedaan, Jaga Hati, Lisan, dan Laku kepada teman atau lainnya',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Saya memposting komentar yang jahat atau menyakitkan tentang saya secara online',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Saya memposting gambar yang jahat atau menyakitkan tentang seseorang secara online',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Saya memposting video yang jahat atau menyakitkan tentang seseorang secara online',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Saya membuat halaman web yang jahat atau menyakitkan tentang seseorang secara online',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Saya menyebarkan rumor tentang seseorang secara online',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        // create soal
        $soal6 = SoalSkrinning::create([
            'soal' => 'Saya mengancam untuk menyakiti seseorang melalui pesan teks telepon seluler',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Saya mengancam untuk menyakiti seseorang secara online',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);

        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Saya berpura-pura menjadi seseorang secara online dan bertindak dengan cara yang jahat atau menyakitkan kepada seseorang',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Saya memposting julukan atau komentar yang menghina tentang ras atau warna kulit seseorang secara online',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Saya memposting julukan, komentar, atau isyarat yang jahat yang bermakna seksual tentang seseorang secara online',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Saya memposting julukan atau komentar yang jahat tentang agama seseorang secara online',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_B->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sekali',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Beberapa kali',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering kali',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => 'positif'
        ]);
        
    }
}
