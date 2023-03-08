<?php

namespace App\Policies;

use App\Models\Anime\Resolution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResolutionPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
    */
    public function before(User $user)
    {
        if ($user->isAdministrator()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Resolution $resolution)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isMember() || $user->isModerator();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Resolution $resolution)
    {
        return $user->isModerator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Resolution $resolution)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Resolution $resolution)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Resolution $resolution)
    {
        //
    }
}
