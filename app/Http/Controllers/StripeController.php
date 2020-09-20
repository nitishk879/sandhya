<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(Request $request){

        $title = 'Please fill all the required details to make successful payment.';
        $rooms = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        return view('payments.stripe', compact('title', 'rooms'));
    }

    public function save(CheckoutRequest $request){
        $rooms = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        \Stripe\Stripe::setApiKey(config('app.stripe_secret'));

        $collection = collect($rooms->rooms);
        $content = $collection->map(function ($room){return $room['room']->category->name; })->values()->toJson();
        $charge = \Stripe\Charge::create([
            "amount" => $rooms->totalPrice,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Booking for {$rooms->quantity} Room(s)",
            'receipt_email' => $request->email,
            'metadata'  =>  [
                'Room Type'         => $content,
                'Room Booked'       => $rooms->quantity,
                'Arrival Date'      => $request->arrival_date ?? '',
                'Departure Date'    => $request->departure_date ?? '',
            ],
            'shipping'   => [
                'address'   =>[
                    'city'          => $request->city ?? '',
                    'postal_code'   => $request->postalcode ?? '',
                    'line1'         => $request->address ?? '',
                ],
                'name'          =>  $request->first_name . ' ' . $request->last_name ?? '',
                'phone'         =>  $request->phone ?? ''
            ]
        ]);

        if($charge['status'] == 'succeeded') {

            $request->session()->forget('cart');
            $request->session()->flush();

            return back()->with('success', 'Payment has been processed successful.');

        }else{
            return back()->with('danger', 'Can not charge payment with previous details.');
        }
    }
}
