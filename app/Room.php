<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'overview', 'slug', 'image', 'price', 'availability', 'category_id', 'type_id'];
    protected $table = 'rooms';

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function category(){
        return $this->belongsTo(RoomCategory::class);
    }

    public function type(){
        return $this->belongsTo(RoomType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

//    public function categories(){
//        return $this->rooms->map->rooms->flatten()->pluck('category_id')->unique();
//    }
}
