<?php

namespace App\Http\Controllers;

use App\Hotel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'Welcome to ' . config('app.name') . ' | Home';
        $hotels = Hotel::all();

        return view('pages.welcome', compact('page_title', 'hotels'));
    }
}
