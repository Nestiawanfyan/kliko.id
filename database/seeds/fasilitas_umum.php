<?php

use Illuminate\Database\Seeder;
use App\FU;

class fasilitas_umum extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new FU;
        $data->nama = 'Dapur';
        $data->save();

        $data = new FU;
        $data->nama = 'Musholla';
        $data->save();

        $data = new FU;
        $data->nama = 'TV';
        $data->save();

        $data = new FU;
        $data->nama = 'Parkir';
        $data->save();

        $data = new FU;
        $data->nama = 'Security';
        $data->save();
    }
}
