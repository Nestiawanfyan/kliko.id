<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KostFu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost_fu', function(Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kost');
          $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('CASCADE');
          $table->unsignedInteger('id_fu');
          $table->foreign('id_fu')->references('id')->on('fasilitas_umum')->onDelete('CASCADE');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kost_fu');
    }
}
