<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoEdukasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_edukasi', function (Blueprint $table) {
            $table->id('id_video_edukasi');
            $table->string('judul_video_edukasi');
            $table->text('link_video_edukasi');
            $table->date('tgl_upload');
            $table->bigInteger('upload_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('upload_user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_edukasi');
    }
}
