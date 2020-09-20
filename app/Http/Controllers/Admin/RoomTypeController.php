<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = RoomType::latest()->paginate(15);
        $title = "Room types";
        return view('admin.room_types.index', compact( 'title', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add new Room type ";
        return view('admin.room_types.add', compact('title'));
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
            'name'         => 'required|unique:room_types|max:96',
            'overview'        => 'required|unique:room_types|max:191',
        ));

        $type = new RoomType();

        $type->name        = $request->input('name');
        $type->overview    = $request->input('overview');
        $type->slug        =   Str::slug($request->name, '-');
        $type->user_id          = auth()->user()->id;

        $type->save();

        return redirect('/admin/room-types')->with('success', "{$type->name} has been created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        $title = "All About $roomType->name";
        $type = $roomType;
        return view('admin.room_types.view', compact('title', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        $title = "Edit $roomType->name";
        $type = $roomType;
        return view('admin.room_types.edit', compact('title', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        $request->validate(array(
            'name' => 'required|max:96',
            'overview' => 'required',
        ));

        $roomType->name        = $request->input('name');
        $roomType->overview    = $request->input('overview');
        $roomType->user_id     = auth()->user()->id;
        $roomType->slug        =   Str::slug($request->name, '-');

        $roomType->save();

        return redirect('/admin/room-types')->with('success', "{$roomType->name} has been created successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        if (Gate::denies('can-update-destination', $roomType)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit Hotel Type');
        }

        $roomType->delete();

        return redirect("/admin/room-types")->with("success", "Hotel Type {$roomType->name} has been deleted successfully");
    }
}