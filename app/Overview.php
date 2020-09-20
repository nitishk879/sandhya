<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    protected $table = 'hotel_overviews';
    protected $fillable = ['title', 'description', 'order', 'hotel_id', 'status'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
