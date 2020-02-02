<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\LeadRepository;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class LeadRequest extends ActionBasedFormRequest
{
    /**
     * Get the validation rules that apply to the request for the store action.
     *
     * @return array
     */
    public static function store()
    {
        return [
            'email' => 'required',
            'first_name' => 'max:100|required',
            'company' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request for the update action.
     *
     * @return array
     */
    public static function update()
    {
        return static::store();
    }
}
