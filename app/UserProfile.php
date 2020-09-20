<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = array('first_name', 'last_name', 'contact_number', 'user_avatar', 'user_bio');
    protected $table = 'user_profiles';

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
