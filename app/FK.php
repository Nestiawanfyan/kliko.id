<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FK extends Model
{
    protected $table = 'fasilitas_kost';

    public function fasilitas_kost() {
        return $this->belongsToMany('App\Kost', 'id_kost');
    }
    // public function fasilitas() {
    //     return $this->hasMany('App\failitas', 'id_fasilitas');
    // }
}
