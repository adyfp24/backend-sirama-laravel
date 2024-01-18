<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomChatMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_chat_mes', function (Blueprint $table) {
            $table->id('id_room_chat_me');
            $table->bigInteger('remaja_user_id')->unsigned();
            $table->bigInteger('guru_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('remaja_user_id')->references('id_remaja')->on('remajas')->onDelete('cascade');
            $table->foreign('guru_user_id')->references('id_guru')->on('gurus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_chat_mes');
    }
}
