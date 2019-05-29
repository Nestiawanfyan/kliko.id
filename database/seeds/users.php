<?php

use Illuminate\Database\Seeder;
use App\User;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User;
        $data->nama = 'Niki Rahmadi Wiharto';
        $data->email = 'nikirahmadiwiharto@gmail.com';
        $data->username = 'nikirahmadi';
        $data->password = bcrypt('nikirahmadi');
        $data->save();
    }
}
