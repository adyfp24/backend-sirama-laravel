<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagianSkrinningUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_skrinning_users', function (Blueprint $table) {
            $table->id('id_bag_skrin_user');
            $table->bigInteger('skrin_user_id')->unsigned();
            $table->bigInteger('bagian_skrinning_id')->unsigned();
            $table->timestamps();

            $table->foreign('skrin_user_id')->references('id_skrin_user')->on('skrinning_users')->onDelete('cascade');
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
        Schema::dropIfExists('bagian_skrinning_users');
    }
}
