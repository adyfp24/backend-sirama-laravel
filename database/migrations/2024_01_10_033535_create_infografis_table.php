<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfografisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infografis', function (Blueprint $table) {
            $table->id('id_infografis');
            $table->string('judul_infografis');
            $table->text('deskripsi_infografis');
            $table->date('tgl_upload');
            $table->text('gambar_infografis')->nullable();
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
        Schema::dropIfExists('infografis');
    }
}
