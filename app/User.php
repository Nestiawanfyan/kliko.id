<?php

// namespace App;
//
// use Illuminate\Foundation\Auth\User as Authenticatable;
//
// class User extends Authenticatable
// {
//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'email', 'password',
//     ];
//
//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    protected $fillable = ['id', 'nama', 'email', 'username', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kost() {
        return $this->hasMany('App\Kost', 'user_id');
    }

    public function percetakan() {
        return $this->hasMany('App\Percetakan', 'id_user');
    }
}
