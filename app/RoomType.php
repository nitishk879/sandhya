<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    use SoftDeletes;

    protected $fillable = array('name', 'overview', 'slug');
    protected $table = 'room_types';

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
