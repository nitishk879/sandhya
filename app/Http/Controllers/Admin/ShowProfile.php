<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Gate::allows('edit-settings')){
            return view('admin.users.show-profile', ['user' => User::findOrFail($request->id)]);
        }

        return view('admin.users.show-profile', ['user' => User::findOrFail(Auth::user()->id)]);
    }
}
