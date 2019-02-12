<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\InvestorRepository;

use Illuminate\Validation\Rule;
use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class InvestorRequest extends ActionBasedFormRequest
{
    /**
     * Get the validation rules that apply to the request for the store action.
     *
     * @return array
     */
    public static function store()
    {
        if (request()->has('featured_photo')) {
            return [
                'featured_photo[]' => 'image',
            ];
        }

        $repository = new InvestorRepository();
        $model = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular('investors')
            )
        );

        $id = $model ? $model->id : null;

        return [
            'document_number' => [
                'required',
                'alpha_num',
                Rule::unique('users')->where(function ($query) { return $query->where('document_type_id', request()->document_type_id); })->ignore($id)
            ],
            'document_type_id' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id)
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:6',
            'slug' => [
                Rule::unique('users')->ignore($id)
            ],
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
