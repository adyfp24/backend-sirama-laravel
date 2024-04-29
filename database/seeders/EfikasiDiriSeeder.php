<?php

namespace Database\Seeders;

use App\Models\BagianSkrinning;
use App\Models\Skrinning;
use App\Models\SoalSkrinning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EfikasiDiriSeeder extends Seeder
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
            'jenis_skrinning' => 'Skrining Efikasi Diri', 
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
            'jangkauan_awal' => 73,
            'jangkauan_akhir' => 120,
            'hasil' => 'memiliki kemampuan kelola emosi, belajar, dan bersosialisasi dengan baik. Hargai Perbedaan, Jaga Hati, Lisan, dan Laku kepada orang lain sebagai langkah cegah bullying di sekitar kita', 
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jangkauan_hasil_skrinnings')->insert([
            'jangkauan_awal' => 24,
            'jangkauan_akhir' => 72,
            'hasil' => 'tingkatkan kemampuan kelola emosi, belajar, dan bersosialisasi. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);

        //create soal 
        $soal1 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu meminta bantuan guru saat Kamu tidak mampu menyelesaikan tugas sekolah? ',
            'no_soal' => 1,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal1->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        
        //create soal 
        $soal2 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu mengungkapkan pendapatmu ketika teman sekelas lainnya tidak setuju dengan pendapatmu? ',
            'no_soal' => 2,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal2->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal3 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil menghibur diri sendiri ketika terjadi peristiwa yang tidak menyenangkan? ',
            'no_soal' => 3,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal3->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal4 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu belajar ketika ada hal menarik lainnya untuk dilakukan? ',
            'no_soal' => 4,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal4->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal5 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menjadi tenang kembali ketika Kamu sangat ketakutan? ',
            'no_soal' => 5,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal5->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal6 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menjalin pertemanan dengan anak-anak lain?',
            'no_soal' => 6,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal6->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal7 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu belajar satu bab untuk ujian?',
            'no_soal' => 7,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal7->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal8 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berbincang-bincang dengan orang yang tidak dikenal? ',
            'no_soal' => 8,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal8->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal9 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu mencegah dirimu menjadi gugup? ',
            'no_soal' => 9,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal9->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal10 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menyelesaikan semua pekerjaan rumahmu setiap hari?',
            'no_soal' => 10,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal10->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal11 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu bekerja secara kompak  dengan teman sekelasmu? ',
            'no_soal' => 11,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal11->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal12 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu mengendalikan perasaanmu? ',
            'no_soal' => 12,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal12->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal13 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu memusatkan perhatian selama mengikuti pelajaran di kelas?',
            'no_soal' => 13,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal13->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal14 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menyampaikan kepada anak-anak lain bahwa mereka melakukan sesuatu yang tidak Kamu sukai?',
            'no_soal' => 14,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal14->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);

        //create soal 
        $soal15 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menyemangati diri sendiri ketika Kamu merasa sedih? ',
            'no_soal' => 15,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal15->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal15->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal15->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal15->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal15->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal16 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil memahami semua mata pelajaran di sekolah? ',
            'no_soal' => 16,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal16->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal16->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal16->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal16->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal16->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal17 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menceritakan peristiwa lucu kepada sekelompok anak?',
            'no_soal' => 17,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal17->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal17->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal17->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal17->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal17->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal18 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu memberi tahu teman bahwa Kamu sedang tidak enak badan?',
            'no_soal' => 18,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal18->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal18->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal18->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal18->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal18->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal19 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu menyenangkan/membahagiakan orang tuamu dengan tugas sekolahmu?',
            'no_soal' => 19,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal19->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal19->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal19->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal19->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal19->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        //create soal 
        $soal20 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu bertahan menjalin pertemanan dengan anak-anak lain?',
            'no_soal' => 20,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal20->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal20->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal20->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal20->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal20->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        //create soal 
        $soal21 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil menekan pikiran yang tidak menyenangkan?',
            'no_soal' => 21,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal21->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal21->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal21->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal21->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal21->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal22 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil dalam ujian?',
            'no_soal' => 22,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal22->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal22->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal22->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal22->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal22->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal23 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil mencegah pertengkaran dengan anak lain? ',
            'no_soal' => 23,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal23->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal23->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal23->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal23->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal23->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
       
        $soal24 = SoalSkrinning::create([
            'soal' => 'Seberapa mampu Kamu berhasil untuk tidak mengkhawatirkan hal-hal yang mungkin terjadi?',
            'no_soal' => 24,
            'bagian_skrinning_id' => $bs_A->id_bagian_skrinning
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sama sekali tidak mampu',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => $soal24->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sedikit mampu',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => $soal24->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Cukup mampu',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => $soal24->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Mampu',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => $soal24->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sangat mampu',
            'poin_jawaban' => 5,
            'soal_skrinning_id' => $soal24->id_soal_skrinning,
            'jenis_jawaban' => ''
        ]);
    }
}
