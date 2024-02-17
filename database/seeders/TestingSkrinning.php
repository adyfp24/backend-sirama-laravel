<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestingSkrinning extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagian_skrinnings')->insert([
            'nama_bagian' => 'Bagian A',
            'deskripsi_bagian' => 'Bagaimana mereka membully Kamu? (Klik pada jawaban seberapa sering Kamu mengalami bullying)?',
            'urutan_bagian' => 1,
            'skrinning_id' => 1
        ]);
        DB::table('bagian_skrinnings')->insert([
            'nama_bagian' => 'Bagian B',
            'deskripsi_bagian' => 'Seberapa berat masalah bullying bagi Kamu?',
            'urutan_bagian' => 2,
            'skrinning_id' => 1
        ]);

        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'Sobat RAMA "Nama User" cenderung sebagai korban bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => 1
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'Selamat! Sobat RAMA "Nama User" tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying ',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => 1
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'Sobat RAMA "nama user/siswa" cenderung sebagai korban bullying. Belajar Yuk di Fitur Video Edukasi dan Infografis serta layanan Tanya Ahli. Semoga Membantu ',
            'jenis_hasil' => 'positif',
            'bagian_skrinning_id' => 2
        ]);
        DB::table('hasil_skrinnings')->insert([
            'hasil' => 'Selamat! Sobat RAMA "Nama User" tidak terlibat dengan bullying pada remaja. Jaga Hati, Lisan, Laku dan Hargai Perbedaan untuk cegah Bullying',
            'jenis_hasil' => 'negatif',
            'bagian_skrinning_id' => 2
        ]);

        DB::table('soal_skrinnings')->insert([
            'soal' => 'Memanggil saya dengan julukan',
            'no_soal' => 1,
            'bagian_skrinning_id' => 1
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => 1,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => 1,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => 1,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => 1,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => 1,
            'jenis_jawaban' => 'positif'
        ]);

        DB::table('soal_skrinnings')->insert([
            'soal' => 'Mengolok-olok saya',
            'no_soal' => 2,
            'bagian_skrinning_id' => 1
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => 2,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => 2,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => 2,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => 2,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => 2,
            'jenis_jawaban' => 'positif'
        ]);

        DB::table('soal_skrinnings')->insert([
            'soal' => 'Membuat saya merasa sakit',
            'no_soal' => 1,
            'bagian_skrinning_id' => 2
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => 3,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => 3,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => 3,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => 3,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => 3,
            'jenis_jawaban' => 'positif'
        ]);

        DB::table('soal_skrinnings')->insert([
            'soal' => 'Saya tidak bisa mendapat teman.',
            'no_soal' => 2,
            'bagian_skrinning_id' => 2
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Tidak pernah terjadi',
            'poin_jawaban' => 0,
            'soal_skrinning_id' => 4,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Jarang terjadi',
            'poin_jawaban' => 1,
            'soal_skrinning_id' => 4,
            'jenis_jawaban' => 'negatif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Kadang terjadi',
            'poin_jawaban' => 2,
            'soal_skrinning_id' => 4,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Sering terjadi',
            'poin_jawaban' => 3,
            'soal_skrinning_id' => 4,
            'jenis_jawaban' => 'positif'
        ]);
        DB::table('jawaban_skrinnings')->insert([
            'jawaban' => 'Selalu terjadi',
            'poin_jawaban' => 4,
            'soal_skrinning_id' => 4,
            'jenis_jawaban' => 'positif'
        ]);

    }
}
