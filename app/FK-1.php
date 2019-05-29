<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FK extends Model
{
    protected $table = 'fasilitas_khusus';

    public function kostFK() {
        return $this->belongsToMany('App\Kost', 'kost_fk', 'id_fk', 'id_kost');
    }
}
