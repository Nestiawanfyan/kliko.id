<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');
          $table->string('email');
          $table->unique('email');
          $table->string('foto');
          $table->string('username');
          $table->unique('username');
          $table->string('password');
          $table->boolean('konfirmasi')->default(0);
          $table->string('kode_konfirmasi')->nullable();
          $table->rememberToken();
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
        Schema::drop('users');
    }
}
