<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatpendAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatpend_ahlis', function (Blueprint $table) {
            $table->id('id_riwayatpend_ahli');
            $table->text('riwayat_pendidikan');
            $table->bigInteger('ahli_user_id')->unsigned();
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
        Schema::dropIfExists('riwayatpend_ahlis');
    }
}
