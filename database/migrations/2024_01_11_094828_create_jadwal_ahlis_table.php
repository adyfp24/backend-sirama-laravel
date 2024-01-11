<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ahlis', function (Blueprint $table) {
            $table->id('id_jadwal_ahli');
            $table->bigInteger('ahli_user_id')->unsigned();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->timestamps();

            $table->foreign('ahli_user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_ahlis');
    }
}
