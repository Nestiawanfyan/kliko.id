<?php

use Illuminate\Database\Seeder;
use App\FK;

class fasilitas_khusus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new FK;
        $data->nama = 'Kasur';
        $data->save();

        $data = new FK;
        $data->nama = 'Kursi';
        $data->save();

        $data = new FK;
        $data->nama = 'Almari Pakaian';
        $data->save();

        $data = new FK;
        $data->nama = 'Meja Belajar';
        $data->save();

        $data = new FK;
        $data->nama = 'TV';
        $data->save();

        $data = new FK;
        $data->nama = 'AC';
        $data->save();
    }
}
