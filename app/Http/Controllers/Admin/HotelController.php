<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Hotel::class, 'hotel');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Our hotels";
        $hotels = Hotel::latest()->paginate(3);

        return view('admin.hotels.index', compact('title', 'hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create New Hotel";
        return view('admin.hotels.add', compact('title'));
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
            'name' => 'required|unique:hotels|max:96',
            'overview' => 'required|min:12|max:158',
            'description' => 'required|min:12',
            'image' => 'image|nullable|unique:hotels|max:5200',
            'address' => 'required|unique:hotels|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:14',
            'phone_alt' => 'required|max:14',
            'price' => 'nullable',
            'rooms' => 'nullable',
        ));

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "{$fileName }.{$fileExt}";
            $request->file('image')->storeAs('public/hotels', $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $hotel = new Hotel();
        $hotel->name          =   $request->input('name');
        $hotel->overview      =   $request->input('overview');
        $hotel->description   =   $request->input('description');
        $hotel->address       =   $request->input('address');
        $hotel->email           =   $request->input('email');
        $hotel->phone           =   $request->input('phone');
        $hotel->phone_alt       =   $request->input('phone_alt');

        $hotel->price         =   $request->input('price');
        $hotel->slug          =   Str::slug($request->name, '-');
        $hotel->rooms         =   $request->input('rooms');
        $hotel->image         =   $fileNameToStore;

        $hotel->user_id             =   Auth::user()->id;
        $hotel->save();

        return redirect('admin/hotels')->with('success', "$hotel->name created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $title = "All About $hotel->name";

        return view('admin.hotels.view', compact('title', 'hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $title = "Edit $hotel->name";

        return view('admin.hotels.edit', compact('title', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate(array(
            'name' => 'required|max:96',
            'overview' => 'required|min:12',
            'description' => 'required|min:12',
            'image' => 'image|nullable|max:5200',
            'address' => 'required|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:14',
            'phone_alt' => 'required|max:14',
            'price' => 'nullable',
            'rooms' => 'nullable',
        ));

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "{$fileName }.{$fileExt}";
            $request->file('image')->storeAs('public/hotels', $fileNameToStore);

        }else{
            $fileNameToStore = $hotel->image;
        }

        $hotel->name          =   $request->input('name');
        $hotel->overview      =   $request->input('overview');
        $hotel->description   =   $request->input('description');
        $hotel->address       =   $request->input('address');
        $hotel->email           =   $request->input('email');
        $hotel->phone           =   $request->input('phone');
        $hotel->phone_alt       =   $request->input('phone_alt');

        $hotel->price         =   $request->input('price');
        $hotel->slug          =   Str::slug($request->name, '-');
        $hotel->rooms         =   $request->input('rooms');
        $hotel->image         =   $fileNameToStore;

        $hotel->user_id             =   Auth::user()->id;
        $hotel->save();

        return redirect('admin/hotels')->with('success', "$hotel->name updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        if (!Auth::user()->isAdmin()){
            return back()->with('error', 'Sorry you are not eligible to edit Hotel');
        }

        return redirect("/admin/hotels")->with("success", "Hotel {$hotel->name} has been deleted successfully");
    }
}
