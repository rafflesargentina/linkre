<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Promoter, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class PromoterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the promoter.
     *
     * @param  User     $user
     * @param  Promoter $promoter
     * @return mixed
     */
    public function view(User $user, Promoter $promoter)
    {
        return true;
    }

    /**
     * Determine whether the user can create promoters.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-promoter');
    }

    /**
     * Determine whether the user can update the promoter.
     *
     * @param  User     $user
     * @param  Promoter $promoter
     * @return mixed
     */
    public function update(User $user, Promoter $promoter)
    {
        if ($promoter->user_id === $user->id) {
            return true;
        }

        return $user->can('update-promoter');
    }

    /**
     * Determine whether the user can delete the promoter.
     *
     * @param  User     $user
     * @param  Promoter $promoter
     * @return mixed
     */
    public function delete(User $user, Promoter $promoter)
    {
        if ($promoter->user_id === $user->id) {
            return true;
        }

        return $user->can('delete-promoter');
    }

    /**
     * Determine whether the user can restore the promoter.
     *
     * @param  User     $user
     * @param  Promoter $promoter
     * @return mixed
     */
    public function restore(User $user, Promoter $promoter)
    {
        if ($promoter->user_id === $user->id) {
            return true;
        }

        return $user->can('restore-promoter');
    }

    /**
     * Determine whether the user can permanently delete the promoter.
     *
     * @param  User     $user
     * @param  Promoter $promoter
     * @return mixed
     */
    public function forceDelete(User $user, Promoter $promoter)
    {
        return $this->delete($user, $promoter);
    }
}
