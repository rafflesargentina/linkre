<?php

namespace Raffles\Modules\Linkre\Policies;

use Raffles\Modules\Linkre\Models\{ Report, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the report.
     *
     * @param  User   $user
     * @param  Report $report
     * @return mixed
     */
    public function view(User $user, Report $report)
    {
        return true;
    }

    /**
     * Determine whether the user can create reports.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-report');
    }

    /**
     * Determine whether the user can update the report.
     *
     * @param  User   $user
     * @param  Report $report
     * @return mixed
     */
    public function update(User $user, Report $report)
    {
        if ($report->user_id === $user->id) {
            return true;
        }

        return $user->can('update-report');
    }

    /**
     * Determine whether the user can delete the report.
     *
     * @param  User   $user
     * @param  Report $report
     * @return mixed
     */
    public function delete(User $user, Report $report)
    {
        if ($report->user_id === $user->id) {
            return true;
        }

        return $user->can('delete-report');
    }

    /**
     * Determine whether the user can restore the report.
     *
     * @param  User   $user
     * @param  Report $report
     * @return mixed
     */
    public function restore(User $user, Report $report)
    {
        if ($report->user_id === $user->id) {
            return true;
        }

        return $user->can('restore-report');
    }

    /**
     * Determine whether the user can permanently delete the report.
     *
     * @param  User   $user
     * @param  Report $report
     * @return mixed
     */
    public function forceDelete(User $user, Report $report)
    {
        return $this->delete($user, $report);
    }
}
