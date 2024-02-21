<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatHasilSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_hasil_skrinnings', function (Blueprint $table) {
            $table->id('id_hasil_skrinning');
            $table->string('jenis_hasil',10);
            $table->text('hasil');
            $table->date('tgl_pengisian');
            $table->bigInteger('bag_skrin_user_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('bag_skrin_user_id')->references('id_bag_skrin_user')->on('bagian_skrinning_users')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_hasil_skrinnings');
    }
}
