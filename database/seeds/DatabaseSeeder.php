<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(admins::class);
        $this->call(fasilitas_kamar_mandi::class);
        $this->call(fasilitas_khusus::class);
        $this->call(fasilitas_lingkungan::class);
        $this->call(fasilitas_umum::class);
        $this->call(parkirs::class);
        $this->call(users::class);
        $this->call(kosts::class);
    }
}
