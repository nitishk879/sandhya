<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('checkRole', 'admin');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserProfile::create($request->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required',
            'contact_number'=> 'required|unique:user_profiles',
            'user_bio'      => 'required',
            'user_avatar'   => 'required',
            'user_id'       => 'required'
        ]));

        return redirect('admin.users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Gate::denies('can-access-user', $user)){
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        return view('admin.users.show-profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('can-access-user', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('can-access-user', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        $user->delete();

        return redirect('admin/users')->with('success', "{$user->name} has been deleted successfully");
    }


    /**
     * Assign some roles to the user
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     *
     */
    public function addRoles(User $user)
    {
        if (Gate::denies('can-access-user', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        $roles = Role::all();

        return view('admin.users.add-role', compact('roles', 'user'));
    }
    public function assignRoles(Request $request, User $user)
    {
        if (Gate::denies('admin', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        $request->validate(array(
            'roles'        => 'required',
        ));
        $user->roles()->sync($request->roles);
        return redirect("admin/users")->with('success', " A New Role has been assigned to {$user->name}");
    }

    /**
     * Remove role from user
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     *
     */
    public function removeRoles(User $user)
    {
        if (Gate::denies('admin', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        return view('admin.users.remove-role', compact( 'user'));
    }
    public function refuseRoles(Request $request, User $user)
    {
        if (Gate::denies('admin', $user)) {
            return redirect('home')->with('error', 'Sorry you are not eligible to edit user');
        }

        $request->validate(array(
            'roles'        => 'required',
        ));

        $user->roles()->sync($request->roles);

        return redirect('admin/users')->with('success', 'Roles removed successfully');
    }
}
