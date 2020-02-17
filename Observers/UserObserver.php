<?php

namespace Raffles\Modules\Linkre\Observers;

use Raffles\Observers\BaseObserver;
use Raffles\Modules\Linkre\Models\User;
use Raffles\Modules\Linkre\Notifications\InvestmentsAssigned;
use Raffles\Modules\Linkre\Repositories\{ FeedRepository, InvestmentRepository };

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
        if ($investments) {
            foreach($investments as $investment) {
                array_push($new, $investment['id']);
            }

            $difference = array_merge(array_diff($new, $old), array_diff($old, $new));
            if ($difference) {
                $user->notify(new InvestmentsAssigned($investments));
               
                try {
                    $rInvestment = new InvestmentRepository;
                    $investments = $rInvestment->whereIn('id', $difference)->get();

                    $repository = new FeedRepository;
                    $repository->create(
                        [
                            'description' => 'Un miembro del equipo le asignó al usuario '.$user->first_name.' '.$user->last_name.' ('.$user->document_type->name.' '.$user->document_number.') permisos de visualización para los siguientes proyectos: '.implode(',', $investments->pluck('name')->toArray()),
                            'title' => 'Asignación de permisos para visualizar Proyectos',
                            'user_id' => $user->id
                        ]
                    );
                } catch (\Exception $e) {
                    //
                } 
            }
        }
    }
}
