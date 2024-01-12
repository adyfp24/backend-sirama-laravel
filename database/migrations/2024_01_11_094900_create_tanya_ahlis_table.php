<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanyaAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanya_ahlis', function (Blueprint $table) {
            $table->id('id_tanya_ahli');
            $table->bigInteger('topik_id')->unsigned(); 
            $table->bigInteger('penanya_user_id')->unsigned(); 
            $table->text('pertanyaan'); 
            $table->boolean('status_pertanyaan'); 
            $table->timestamp('waktu_tanya');
            $table->timestamps();

            $table->foreign('topik_id')->references('id_jenis_topik_pertanyaan')->on('jenis_topik_pertanyaans')->onDelete('cascade');
            $table->foreign('penanya_user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanya_ahlis');
    }
}
