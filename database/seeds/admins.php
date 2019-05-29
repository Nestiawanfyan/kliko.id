<?php

use Illuminate\Database\Seeder;
use App\Admin;

class admins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Admin;
        $data->nama = 'Niki Rahmadi Wiharto';
        $data->email = 'niki@gmail.com';
        $data->username = 'nikirahmadi';
        $data->password = bcrypt('nikirahmadi');
        $data->save();
    }
}
