<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use App\RoomCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $page_title = 'Welcome to ' . config('app.name') . ' | Home';
        $hotels = Hotel::all();

        return view('pages.welcome', compact('page_title', 'hotels'));
    }


    public function about(){
        $page_title = 'About Us';

        return view('pages.about', compact('page_title'));
    }


    public function search(Request $request){
        $page_title = 'Search';
        $arrival_date = $request->arrival_date;
        $departure_date = $request->departure_date;
        $adult_size = $request->adult_size;
        $palace = $request->palace;

        $hotels = Hotel::all();
        $hotel = Hotel::firstWhere('slug', $request->palace);
        $room_categories = RoomCategory::all();
        $rooms = Room::where('hotel_id', $hotel->id)->paginate(12);

        return view('pages.hotels', compact('page_title', 'rooms', 'room_categories', 'arrival_date', 'departure_date', 'adult_size', 'hotels', 'palace'));
    }

    public function filter(Request $request){
        $type = $request->type;
        $min = $request->minPrice;
        $max = $request->maxPrice;

        $title = "Rooms result for filter";
        $room_categories = RoomCategory::all();
        $selected_categories = RoomCategory::whereIn('id', $type)->get();
        $chosen = RoomCategory::select('id')->whereIn('id', $type)->get()->toArray();

        if(!empty($type) && ($min!==0) && ($max==!0)){
            $rooms  = Room::whereIn('category_id', $type)->whereBetween('price', [$min, $max])->paginate(3);
        }else{
            $rooms  = Room::whereBetween('price', [$min, $max])->paginate(4);
        }
        return view('pages.search-ajax', compact('rooms', 'room_categories', 'selected_categories', 'chosen', 'title'));
    }
}
