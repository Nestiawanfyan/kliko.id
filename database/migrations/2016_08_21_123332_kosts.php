<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
          $table->string('seoTitle');
          $table->unique('seoTitle');
          $table->index('seoTitle');
          $table->string('namaPemilik');
          $table->string('telpPemilik', 15);
          $table->string('alamatPemilik');
          $table->string('namaKost');
          $table->string('alamatKost');
          $table->integer('posKost');
          $table->string('telpKost', 15);
          $table->string('luasKamar');
          $table->integer('jumlahKamar');
          $table->enum('penghuni', ['Putra', 'Putri', 'Campur']);
          $table->double('latitude');
          $table->double('longitude');
          $table->integer('sewaMin');
          $table->integer('sewaHari');
          $table->integer('sewaMinggu');
          $table->integer('sewaBulan');
          $table->integer('sewaTahun');
          $table->string('fKhusus');
          $table->string('fUmum');
          $table->string('fLingkungan');
          $table->string('fKamarMandi');
          $table->text('catatan');
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
        Schema::drop('kosts');
    }
}
