<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KostParkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost_parkir', function(Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kost');
          $table->foreign('id_kost')->references('id')->on('kosts')->onDelete('CASCADE');
          $table->unsignedInteger('id_parkir');
          $table->foreign('id_parkir')->references('id')->on('parkirs')->onDelete('CASCADE');
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
        Schema::drop('kost_parkir');
    }
}
