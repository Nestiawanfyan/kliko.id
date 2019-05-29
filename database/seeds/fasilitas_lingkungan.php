<?php

use Illuminate\Database\Seeder;
use App\FL;

class fasilitas_lingkungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new FL;
        $data->nama = 'Rumah Makan';
        $data->save();

        $data = new FL;
        $data->nama = 'Mall';
        $data->save();

        $data = new FL;
        $data->nama = 'Apotik';
        $data->save();

        $data = new FL;
        $data->nama = 'Klinik';
        $data->save();

        $data = new FL;
        $data->nama = 'Sekolah Kampus';
        $data->save();
    }
}
