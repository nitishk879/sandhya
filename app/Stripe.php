<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stripe extends Model
{
    use SoftDeletes;
    protected $fillable = ['payment_id', 'payer_email', 'amount', 'currency', 'payment_status', 'ip', 'booking_id'];
    protected $table = 'payments';


    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
