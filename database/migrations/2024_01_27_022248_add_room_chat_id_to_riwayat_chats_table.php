<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoomChatIdToRiwayatChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat_chats', function (Blueprint $table) {
            // Menambahkan kolom room_chat_id pada tabel riwayat_chats sebagai foreign key
            $table->bigInteger('room_chat_id')->unsigned()->nullable();
            $table->foreign('room_chat_id')->references('id_room_chat_me')->on('room_chat_mes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_chats', function (Blueprint $table) {
            // Menghapus foreign key dan kolom room_chat_id pada rollback
            $table->dropForeign(['room_chat_id']);
            $table->dropColumn('room_chat_id');
        });
    }
}
