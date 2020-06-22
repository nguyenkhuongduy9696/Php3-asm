<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='pms';
    public function roles(){
        return $this->belongsToMany(Role::class,'role_pms','id_pms','id_role');
    }
}
