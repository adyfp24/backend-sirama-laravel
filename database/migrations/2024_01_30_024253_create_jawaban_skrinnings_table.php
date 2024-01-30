<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_skrinnings', function (Blueprint $table) {
            $table->id('id_jawaban_skrinning');
            $table->string('jawaban');
            $table->smallInteger('poin_jawaban');
            $table->bigInteger('soal_skrinning_id')->unsigned();
            $table->timestamps();

            $table->foreign('soal_skrinning_id')->references('id_soal_skrinning')->on('soal_skrinnings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_skrinnings');
    }
}
