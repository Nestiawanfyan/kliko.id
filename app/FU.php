<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FU extends Model
{
    protected $table = 'fasilitas_umum';

    public function kostFU() {
        return $this->belongsToMany('App\Kost', 'kost_fu', 'id_fu', 'id_kost');
    }
}
