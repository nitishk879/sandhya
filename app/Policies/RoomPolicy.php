<?php

namespace App\Policies;

use App\Room;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    public function viewAny(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can view the room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $room
     * @return mixed
     */
    public function view(User $user, Room $room)
    {
        return $user->id === $room->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can create rooms.
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
     * Determine whether the user can update the room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $room
     * @return mixed
     */
    public function update(User $user, Room $room)
    {
        return ($user->id === $room->user_id  OR $user->isAdmin())  ? Response::allow() : Response::deny('You are not a Hotel Manager. Please ask admin or hotel manager to access this area.');
    }

    /**
     * Determine whether the user can delete the room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $room
     * @return mixed
     */
    public function delete(User $user, Room $room)
    {
        return $user->id === $room->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $room
     * @return mixed
     */
    public function restore(User $user, Room $room)
    {
        return $user->id === $room->user_id  OR $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $room
     * @return mixed
     */
    public function forceDelete(User $user, Room $room)
    {
        return $user->id === $room->user_id  OR $user->isAdmin();
    }
}
