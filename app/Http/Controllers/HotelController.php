<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Overview;
use App\Room;
use App\RoomCategory;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request){
        $page_title = 'Our Hotels';
        $hotels = Hotel::paginate(3);
        $rooms = Room::paginate(3);
        $room_categories = RoomCategory::all();

        if($request->session()->has('cart')){
            $collection = collect([$request->session()->get('cart')->rooms]);
        }
        else{
            $collection = collect(['name' => 'Desk', 'price' => 100]);
        }

        return view('pages.hotels', compact('page_title', 'hotels', 'rooms', 'collection', 'room_categories'));
    }

    public function show($slug){
        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $overviews = Overview::where('hotel_id', $hotel->id)->where('status', 1)->get();
        $title = "Welcome to {$hotel->name}";

        return view('pages.hotel', compact('title', 'hotel', 'overviews'));
    }
}
