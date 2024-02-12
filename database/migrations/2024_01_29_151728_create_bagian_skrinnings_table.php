<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagianSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_skrinnings', function (Blueprint $table) {
            $table->id('id_bagian_skrinning');
            $table->string('nama_bagian', 30);
            $table->text('deskripsi_bagian');
            $table->smallInteger('urutan_bagian');
            $table->bigInteger('skrinning_id')->unsigned();
            $table->timestamps();

            $table->foreign('skrinning_id')->references('id_skrinning')->on('skrinnings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bagian_skrinnings');
    }
}
