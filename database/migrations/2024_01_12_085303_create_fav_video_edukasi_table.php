<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavVideoEdukasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_video_edukasi', function (Blueprint $table) {
            $table->id('id_fav_video_edukasi');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_edukasi_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('video_edukasi_id')->references('id_video_edukasi')->on('video_edukasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fav_video_edukasi');
    }
}
