<?php

namespace App;

class Cart
{
    public $rooms = null;
    public $quantity = 0;
    public $totalPrice = 0;
    public $roomKey=0;

    public function __construct($oldCart){
        if ($oldCart){
            $this->rooms        = $oldCart->rooms;
            $this->quantity     = $oldCart->quantity;
            $this->totalPrice   = $oldCart->totalPrice;
        }
    }

    public function add($room, $id){
        $exGirlFriend = array('quantity' => 0, 'roomKey'=>$id, 'price' => $room->price, 'room' => $room);

        if ($this->rooms){
            if (array_key_exists($id, $this->rooms)){
                $exGirlFriend = $this->rooms[$id];
            }
        }

        $exGirlFriend['quantity']++;
        $exGirlFriend['price'] = $room->price * $exGirlFriend['quantity'];
        $this->rooms[$id]   = $exGirlFriend;
        $this->quantity ++;
        $this->totalPrice += $room->price;
    }

    public function removeItem($id){
        $this->quantity -= $this->rooms[$id]['quantity'];
        unset($this->rooms[$id]);
    }
}