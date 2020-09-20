<?php

namespace App\Policies;

use App\Hotel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any hotels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can view the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function view(User $user, Hotel $hotel)
    {
        return $user->id === $hotel->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can create hotels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isHotelManager()) {
            return true;
        }elseif ($user->isAdmin()) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function update(User $user, Hotel $hotel)
    {
        return $user->id === $hotel->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function delete(User $user, Hotel $hotel)
    {
        return $user->id === $hotel->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function restore(User $user, Hotel $hotel)
    {
        return $user->id === $hotel->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function forceDelete(User $user, Hotel $hotel)
    {
        return $user->id === $hotel->user_id  OR $user->isAdmin();
    }
}
