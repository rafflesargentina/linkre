<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Developer, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class DeveloperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the developer.
     *
     * @param  User      $user
     * @param  Developer $developer
     * @return mixed
     */
    public function view(User $user, Developer $developer)
    {
        return true;
    }

    /**
     * Determine whether the user can create developers.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-developer');
    }

    /**
     * Determine whether the user can update the developer.
     *
     * @param  User      $user
     * @param  Developer $developer
     * @return mixed
     */
    public function update(User $user, Developer $developer)
    {
        return $user->can('update-developer');
    }

    /**
     * Determine whether the user can delete the developer.
     *
     * @param  User      $user
     * @param  Developer $developer
     * @return mixed
     */
    public function delete(User $user, Developer $developer)
    {
        return $user->can('delete-developer');
    }

    /**
     * Determine whether the user can restore the developer.
     *
     * @param  User      $user
     * @param  Developer $developer
     * @return mixed
     */
    public function restore(User $user, Developer $developer)
    {
        return $user->can('restore-developer');
    }

    /**
     * Determine whether the user can permanently delete the developer.
     *
     * @param  User      $user
     * @param  Developer $developer
     * @return mixed
     */
    public function forceDelete(User $user, Developer $developer)
    {
        return $this->delete($user, $developer);
    }
}
