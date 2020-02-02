<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Company, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the company.
     *
     * @param  User    $user
     * @param  Company $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can create companys.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-company');
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  User    $user
     * @param  Company $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        if ($company->user_id === $user->id) {
            return true;
        }

        return $user->can('update-company');
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param  User    $user
     * @param  Company $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        if ($company->user_id === $user->id) {
            return true;
        }

        return $user->can('delete-company');
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @param  User    $user
     * @param  Company $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        if ($company->user_id === $user->id) {
            return true;
        }

        return $user->can('restore-company');
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @param  User    $user
     * @param  Company $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        return $this->delete($user, $company);
    }
}
