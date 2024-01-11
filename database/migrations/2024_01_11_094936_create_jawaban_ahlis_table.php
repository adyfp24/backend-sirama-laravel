<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_ahlis', function (Blueprint $table) {
            $table->id('id_jawaban_ahli');
            $table->bigInteger('penjawab_user_id')->unsigned();
            $table->bigInteger('tanya_ahli_id')->unsigned();
            $table->text('jawaban_ahli');
            $table->timestamps('waktu_jawaban');

            $table->foreign('penjawab_user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('tanya_ahli_id')->references('id_tanya_ahli')->on('tanya_ahlis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_ahlis');
    }
}
