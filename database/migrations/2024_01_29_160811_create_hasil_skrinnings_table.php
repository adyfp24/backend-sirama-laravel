<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSkrinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_skrinnings', function (Blueprint $table) {
            $table->id('id_hasil_skrinning');
            $table->text('hasil');
            $table->string('jenis_hasil',10);
            $table->bigInteger('bagian_skrinning_id')->unsigned();
            $table->timestamps();

            $table->foreign('bagian_skrinning_id')->references('id_bagian_skrinning')->on('bagian_skrinnings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_skrinnings');
    }
}
