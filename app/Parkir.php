<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    public function kostParkir() {
        return $this->belongsToMany('App\Kost', 'kost_parkir', 'id_parkir', 'id_kost');
    }
}
