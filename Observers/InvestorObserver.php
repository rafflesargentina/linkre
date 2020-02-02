<?php

namespace Raffles\Modules\Linkre\Observers;

use Raffles\Observers\BaseObserver;
use Raffles\Modules\Linkre\Models\Investor;
use Raffles\Modules\Linkre\Notifications\AssignedInvestmentsNotification;

class InvestorObserver extends BaseObserver
{
    /**
     * Handle the investor "updating" event.
     *
     * @param  \Raffles\Modules\Linkre\Models\Investor  $investor
     * @return void
     */
    //public function saving(Investor $investor)
    //{
        //$investor->load('investments');
        //$previousInvestments = $investor->investments->pluck('id')->toArray();

        //$assignedInvestments = [];
        //$investments = request()->investments;

        //foreach($investments as $investment) {
            //array_push($assignedInvestments, $investment['id']);
        //}

        //$investmentsMerge = array_merge($previousInvestments, $assignedInvestments);
//
        //if ($investmentsMerge) {
           //$investor->notify(new AssignedInvestmentsNotification($assignedInvestments));
        //}
    //}
}
