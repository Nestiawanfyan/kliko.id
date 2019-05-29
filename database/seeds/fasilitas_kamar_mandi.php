<?php

use Illuminate\Database\Seeder;
use App\FKM;

class fasilitas_kamar_mandi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new FKM;
        $data->nama = 'Ember Mandi';
        $data->save();

        $data = new FKM;
        $data->nama = 'Bak Mandi';
        $data->save();

        $data = new FKM;
        $data->nama = 'K. Mandi Dalam';
        $data->save();

        $data = new FKM;
        $data->nama = 'K. Mandi Luar';
        $data->save();

        $data = new FKM;
        $data->nama = 'Kloset Duduk';
        $data->save();
    }
}
