<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FKM extends Model
{
    protected $table = 'fasilitas_kamar_mandi';

    public function kostFKM() {
        return $this->belongsToMany('App\Kost', 'kost_fkm', 'id_fkm', 'id_kost');
    }
}
