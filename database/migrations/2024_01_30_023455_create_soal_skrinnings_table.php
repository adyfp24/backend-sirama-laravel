<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_skrinnings', function (Blueprint $table) {
            $table->id('id_soal_skrinning');
            $table->text('soal');
            $table->smallInteger('no_soal');
            $table->bigInteger('bagian_skrinning_id')->unsigned();
            $table->timestamps();

            $table->foreign('bagian_skrinning_id')->references('id_bagian_skrinning')->on('bagian_skrinnings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_skrinnings');
    }
}
