<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RoomCategory::latest()->paginate(15);
        $title = "Room Category";
        return view('admin.room_categories.index', compact( 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add new Room Category ";
        return view('admin.room_categories.add', compact('title'));
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
            'name'         => 'required|unique:room_categories|max:96',
            'overview'        => 'required|unique:room_categories'
        ));

        $category = new RoomCategory();
        $category->name        = $request->input('name');
        $category->overview    = $request->input('overview');
        $category->user_id     = auth()->user()->id;
        $category->slug        =   Str::slug($request->name, '-');
        $category->save();

        return redirect('admin/room-categories')->with('success', "$category->name has been created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RoomCategory $roomCategory)
    {
        $title = "All About $roomCategory->name";
        $category = $roomCategory;
        return view('admin.room_categories.view', compact('title', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomCategory $roomCategory)
    {
        $title = "Edit $roomCategory->name";
        $category = $roomCategory;
        return view('admin.room_categories.edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomCategory $roomCategory)
    {
        $request->validate(array(
            'name'         => 'required|max:96',
            'overview'        => 'required'
        ));

        $roomCategory->name        = $request->input('name');
        $roomCategory->overview    = $request->input('overview');
        $roomCategory->user_id     = auth()->user()->id;
        $roomCategory->slug        =   Str::slug($request->name, '-');
        $roomCategory->save();

        return redirect('admin/room-categories')->with('success', "$roomCategory->name category has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomCategory $roomCategory)
    {
        if (Gate::denies('can-update-room', $roomCategory)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit Hotel Category');
        }

        $roomCategory->delete();

        return redirect("/admin/room-categories")->with("success", "Room Category {$roomCategory->name} has been deleted successfully");
    }
}