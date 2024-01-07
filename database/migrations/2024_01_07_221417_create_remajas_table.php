<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remajas', function (Blueprint $table) {
            $table->id('id_remaja');
            $table->string('nama');
            $table->string('no_hp');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('sekolah');
            $table->text('foto_profile');
            $table->bigInteger('user_id');
            $table->timestamps();

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
        Schema::dropIfExists('remajas');
    }
}
