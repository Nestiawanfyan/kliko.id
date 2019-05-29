<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    public function fotoKos() {
        return $this->belongsTo('App\Kost', 'id_kost');
    }
}
