<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $fillable=['product_id','user_id','detail','created_at','updated_at'];
    public function getUser(){
        return User::find($this->user_id);
    }
}
