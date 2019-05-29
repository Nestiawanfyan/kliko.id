<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Percetakan extends Model
{
    protected $table = "percetakan";
    protected $dates = ['deleted_at'];

    public function printFoto() {
        return $this->belongsToMany('App\Percetakan_Foto', 'print_foto', 'id_percetakan', 'id_foto');
    }

  	public function fotoprint() {
  		return $this->hasMany('App\PercetakanFoto', 'id_percetakan');
    }

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
   
}
