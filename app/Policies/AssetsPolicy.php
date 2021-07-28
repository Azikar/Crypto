<?php

namespace App\Policies;

use App\Models\Asset\Asset;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetsPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Asset $asset)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Asset $asset)
    {
        return $user->id === $asset->user_id;
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user, Asset $asset)
    {
        return $user->id === $asset->user_id;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Asset $asset)
    {
        return $user->id === $asset->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Asset $asset)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asset\Asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Asset $asset)
    {
        //
    }
}
