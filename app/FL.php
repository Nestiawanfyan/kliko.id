<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FL extends Model
{
    protected $table = 'fasilitas_lingkungan';

    public function kostFL() {
        return $this->belongsToMany('App\Kost', 'kost_fl', 'id_fl', 'id_kost');
    }
}
