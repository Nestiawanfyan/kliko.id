<?php

use Illuminate\Database\Seeder;
use App\Kost;

class kosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $kost = new Kost;
      $kost->user_id        = 1;
      $kost->seoTitle       = 'kost-ceria';
      $kost->namaPemilik    = 'Niki Rahmadi Wiharto';
      $kost->telpPemilik    = '085783104873';
      $kost->alamatPemilik  = 'Jalan Imam Bonjol Gg. Duren No. 33 Bandar Lampung';
      $kost->namaKost       = 'Kost Ceria';
      $kost->alamatKost     = 'Jalan Imam Bonjol Gg. Duren No. 33 Bandar Lampung';
      $kost->posKost        = 35151;
      $kost->telpKost       = '085783104873';
      $kost->luasKamar      = '4x5';
      $kost->jumlahKamar    = 8;
      $kost->penghuni       = 'Putra';
      $kost->latitude       = -5.3971396;
      $kost->longitude      = 105.2667887;
      $kost->sewaMin        = 6;
      $kost->sewaHari       = 50000;
      $kost->sewaMinggu     = 100000;
      $kost->sewaBulan      = 400000;
      $kost->sewaTahun      = 4000000;
      $kost->fKhusus        = 'Meja Belajar, Sprai';
      $kost->fUmum          = 'Dapur, Ruang Makan';
      $kost->fLingkungan    = 'Apotek, Halte';
      $kost->fKamarMandi    = 'Ember';
      $kost->catatan        = 'Tidak Ada';
      $kost->namaPengirim   = 'Niki Rahmadi Wiharto';
      $kost->telpPengirim   = '085783104873';
      $kost->emailPengirim  = 'nikirahmadiwiharto@gmail.com';
      $kost->statusPengirim = 'Pemilik';
      $kost->konfirmasi     = 1;
      $kost->save();

    }
}
