<?php

use Illuminate\Database\Seeder;
use App\Parkir;

class parkirs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Parkir;
        $data->nama = "Mobil";
        $data->save();

        $data = new Parkir;
        $data->nama = "Motor";
        $data->save();

        $data = new Parkir;
        $data->nama = "Sepeda";
        $data->save();
    }
}
