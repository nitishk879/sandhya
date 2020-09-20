<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Room;
use App\RoomCategory;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Room::class, 'room');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Our rooms";
        $rooms = Room::latest()->paginate(12);

        return view('admin.rooms.index', compact('title', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "Create New Room";
        $categories = RoomCategory::all();
        $types = RoomType::all();
        $hotels = Hotel::all();
        return view('admin.rooms.add', compact('title', 'types', 'hotels', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'name' => 'required',
            'price' => 'required',
            'overview'          => 'required',
            'hotel'          => 'required',
            'category'          => 'required',
            'type'          => 'required',
            'image' => 'image|nullable|unique:rooms|max:5200',
        ));

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "{$fileName }.{$fileExt}";
            $request->file('image')->storeAs('public/rooms', $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $room = new Room();

        $room->name = $request->input('name');
        $room->price = $request->input('price');
        $room->overview = $request->input('overview');
        $room->hotel_id = $request->input('hotel');
        $room->category_id = $request->input('category');
        $room->type_id = $request->input('type');
        $room->image = $fileNameToStore;
        $room->user_id = Auth::user()->id;
        $room->slug = Str::slug($request->name, '-');
        $room->save();

        return redirect('admin/rooms')->with("success", "{$room->name} has been created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $title = "All About $room->name";

        return view('admin.rooms.view', compact('title', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {

        $title = "Edit $room->name";
        $categories = RoomCategory::all();
        $types = RoomType::all();
        $hotels = Hotel::all();

        return view('admin.rooms.edit', compact('title', 'room', 'hotels', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate(array(
            'name' => 'required',
            'price' => 'required',
            'overview'          => 'required',
            'hotel'          => 'required',
            'category'          => 'required',
            'type'          => 'required',
            'image' => 'image|nullable|max:5200',
        ));

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "{$fileName }.{$fileExt}";
            $request->file('image')->storeAs('public/rooms', $fileNameToStore);

        }else{
            $fileNameToStore = $room->image;
        }

        $room->name = $request->input('name');
        $room->price = $request->input('price');
        $room->overview = $request->input('overview');
        $room->hotel_id = $request->input('hotel');
        $room->category_id = $request->input('category');
        $room->type_id = $request->input('type');
        $room->image = $fileNameToStore;
        $room->user_id = Auth::user()->id;
        $room->slug = Str::slug($request->name, '-');
        $room->save();

        return redirect('admin/rooms')->with("success", "{$room->name} has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
