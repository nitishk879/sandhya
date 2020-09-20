<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request){
        if (!$request->session()->has('cart')){
            return redirect('hotels')->with('error', "Sorry! You donn't have any room in to your basket. Please add at least one.");
        }

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        $title     =  "We have {$cart->quantity} rooms added as per your request";
        $rooms     =  $cart->rooms;
        $totalQuantity  =  $cart->quantity;
        $totalPrice = $cart->totalPrice;

        return view('pages.booking', compact('title', 'rooms', 'totalQuantity', 'totalPrice'));
    }


    public function addToCart(Request $request, $id){
        $room = Room::find($id);
        $exCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($exCart);
        $cart->add($room, $room->id);

        $request->session()->put('cart', $cart);

        $request->session()->flash('status', 'Task was successful!');

        return back()->with('success', "{$room->category->name} has been added to your basket. You can add more to it.");
    }

    public function removeFromCart(Request $request, $id){
        $room = Room::find($id);
        $exCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($exCart);
        $cart->removeItem($id);

        if (count($cart->rooms) > 0){
            $request->session()->put('cart', $cart);
        }else{
            $request->session()->forget('cart');
        }

        return back()->with('success', "{$room->category->name} has been removed Successfully from your basket. You can add another one to it.");
    }

    public function deleteFromCart(Request $request){
        $request->session()->forget('cart');
        $request->session()->flush();

        return back()->with('success', 'All Rooms has been removed from your basket! Please choose at least one, if you wish to checkout with us.');
    }

    public function checkout(Request $request){
        if (!$request->session()->has('cart')){
            return redirect('hotels')->with('error', 'Sorry! You donn\'t have any booking added earlier for any hotel or any room');
        }

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
    }
}
