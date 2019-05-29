<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    // public function kostParkir() {
    //     return $this->belongsToMany('App\Parkir', 'kost_parkir', 'id_kost', 'id_parkir');
    // }

    public function fasilitas_kost() {
        return $this->hasMany('App\FK', 'id_kost');
    }


    // public function kostFKM() {
    //     return $this->belongsToMany('App\FKM', 'kost_fkm', 'id_kost', 'id_fkm');
    // }

    // public function kostFL() {
    //     return $this->belongsToMany('App\FL', 'kost_fl', 'id_kost', 'id_fl');
    // }

    // public function kostFU() {
    //     return $this->belongsToMany('App\FU', 'kost_fu', 'id_kost', 'id_fu');
    // }
    
    // public function jenis_listrik() {                                                                                   
    //     return $this->belongsToMany('App\Jenis_listrik', 'jenis_listrik', 'id_kost', 'id_foto');
    // }

    public function kostFoto() {
        return $this->belongsToMany('App\Foto', 'kost_foto', 'id_kost', 'id_foto');
    }

  	public function fotoKos() {
  		return $this->hasMany('App\Foto', 'id_kost');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
   
}
