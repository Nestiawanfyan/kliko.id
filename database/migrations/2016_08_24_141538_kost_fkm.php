<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KostFkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost_fkm', function(Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kost');
          $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('CASCADE');
          $table->unsignedInteger('id_fkm');
          $table->foreign('id_fkm')->references('id')->on('fasilitas_kamar_mandi')->onDelete('CASCADE');
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
        Schema::drop('kost_fkm');
    }
}
