<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'title'];
    protected $table = 'roles';
    protected $primaryKey = 'id';

    function users(){
        return $this->belongsToMany('App\User', 'role_user', 'user_id', 'role_id')->withTimestamps();
    }
}
