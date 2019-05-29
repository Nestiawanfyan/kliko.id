<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercetakanFoto extends Model
{

    protected $table = "percetakan_foto";

    public function fotoPrint() {
        return $this->belongsTo('App\Kost', 'id_percetakan');
    }
}
