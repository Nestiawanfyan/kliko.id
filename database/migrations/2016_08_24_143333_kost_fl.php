<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KostFl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost_fl', function(Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kost');
          $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('CASCADE');
          $table->unsignedInteger('id_fl');
          $table->foreign('id_fl')->references('id')->on('fasilitas_lingkungan')->onDelete('CASCADE');
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
        Schema::drop('kost_fl');
    }
}
