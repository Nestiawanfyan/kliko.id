<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KostFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost_fk', function(Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kost');
          $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('CASCADE');
          $table->unsignedInteger('id_fk');
          $table->foreign('id_fk')->references('id')->on('fasilitas_khusus')->onDelete('CASCADE');
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
        Schema::drop('kost_fk');
    }
}
