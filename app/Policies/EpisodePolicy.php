<?php

namespace App\Policies;

use App\Models\Anime;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EpisodePolicy
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
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Episode $episode)
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
        return $user->type === 'member';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Episode $episode)
    {
        return $user->type === 'member' && (int) $episode->anime->page_id === (int) $user->page_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Episode $episode)
    {
        return $user->type === 'member' && (int) $episode->anime->page_id === (int) $user->page_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Episode $episode)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Episode $episode)
    {
        //
    }
}
