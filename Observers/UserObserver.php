<?php

namespace Raffles\Modules\Linkre\Observers;

use Raffles\Observers\BaseObserver;
use Raffles\Modules\Linkre\Models\User;
use Raffles\Modules\Linkre\Notifications\InvestmentsAssigned;

class UserObserver extends BaseObserver
{
    /**
     * Handle the user "updating" event.
     *
     * @param  User  $user
     *
     * @return void
     */
    public function saving(User $user)
    {
        $new = [];
        $old = $user->investments->pluck('id')->toArray();

        $investments = request()->investments;

        if ($invesments) {
            foreach($investments as $investment) {
                array_push($new, $investment['id']);
            }

            $difference = array_merge(array_diff($new, $old), array_diff($old, $new));

            if ($difference) {
               $user->notify(new InvestmentsAssigned($invesments));
            }
        }
    }
}
