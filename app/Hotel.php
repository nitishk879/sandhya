<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'overview', 'description', 'image', 'address', 'slug', 'price'];
    protected $table = 'hotels';

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function overviews(){
        return $this->hasMany(Overview::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
