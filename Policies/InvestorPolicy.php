<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Investor, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the investor.
     *
     * @param  User     $user
     * @param  Investor $investor
     * @return mixed
     */
    public function view(User $user, Investor $investor)
    {
        return true;
    }

    /**
     * Determine whether the user can create investors.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-investor');
    }

    /**
     * Determine whether the user can update the investor.
     *
     * @param  User     $user
     * @param  Investor $investor
     * @return mixed
     */
    public function update(User $user, Investor $investor)
    {
        return $user->can('update-investor');
    }

    /**
     * Determine whether the user can delete the investor.
     *
     * @param  User     $user
     * @param  Investor $investor
     * @return mixed
     */
    public function delete(User $user, Investor $investor)
    {
        return $user->can('delete-investor');
    }

    /**
     * Determine whether the user can restore the investor.
     *
     * @param  User     $user
     * @param  Investor $investor
     * @return mixed
     */
    public function restore(User $user, Investor $investor)
    {
        return $user->can('restore-investor');
    }

    /**
     * Determine whether the user can permanently delete the investor.
     *
     * @param  User     $user
     * @param  Investor $investor
     * @return mixed
     */
    public function forceDelete(User $user, Investor $investor)
    {
        return $this->delete($user, $investor);
    }
}
