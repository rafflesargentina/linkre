<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Investment, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the investment.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @param  \Raffles\Investment  $investment
     * @return mixed
     */
    public function view(User $user, Investment $investment)
    {
        if ($user->investments->contains($investment)) {
            return true;
        }

        if ($user->can('view-investment')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create investments.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-investment');
    }

    /**
     * Determine whether the user can update the investment.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @param  \Raffles\Investment  $investment
     * @return mixed
     */
    public function update(User $user, Investment $investment)
    {
        return $user->can('update-investment');
    }

    /**
     * Determine whether the user can delete the investment.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @param  \Raffles\Investment  $investment
     * @return mixed
     */
    public function delete(User $user, Investment $investment)
    {
        return $user->can('delete-investment');
    }

    /**
     * Determine whether the user can restore the investment.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @param  \Raffles\Investment  $investment
     * @return mixed
     */
    public function restore(User $user, Investment $investment)
    {
        return $user->can('restore-investment');
    }

    /**
     * Determine whether the user can permanently delete the investment.
     *
     * @param  \Raffles\Modules\Linkre\Models\User  $user
     * @param  \Raffles\Investment  $investment
     * @return mixed
     */
    public function forceDelete(User $user, Investment $investment)
    {
        return $this->delete($user, $investment);
    }
}
