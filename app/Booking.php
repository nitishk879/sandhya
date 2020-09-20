<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'address', 'comment', 'price', 'advance', 'booked_from', 'booked_upto', 'room_id', 'adult', 'child', 'booked'];
    protected $table = 'room_bookings';

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(Stripe::class);
    }
}
