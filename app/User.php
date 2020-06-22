<?php

namespace App;

use App\Permission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'pass', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = 'user';
    public function getAuthPassword()
    {
        return $this->pass;
    }
    public function role(){
        return $this->belongsTo(Role::class,'id_role','id');
    }
    public function hasPermission(Permission $permission){
        $check=!!optional(optional($this->role)->permission)->contains($permission);
        return $check;
    }
}
