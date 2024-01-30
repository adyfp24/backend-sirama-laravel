<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_skrinnings', function (Blueprint $table) {
            $table->id('id_riwayat_skrinning');
            $table->text('soal');
            $table->string('jawaban');
            $table->smallInteger('poin_jawaban');
            $table->date('tgl_pengisian');
            $table->bigInteger('bag_skrin_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('bag_skrin_user_id')->references('id_bag_skrin_user')->on('bagian_skrinning_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_skrinnings');
    }
}
