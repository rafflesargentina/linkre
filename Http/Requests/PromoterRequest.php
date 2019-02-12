<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\PromoterRepository;

use Illuminate\Validation\Rule;
use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class PromoterRequest extends ActionBasedFormRequest
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

        $repository = new PromoterRepository();
        $model = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular('promoters')
            )
        );

        $id = $model ? $model->id : null;

        return [
            'description' => 'required',
            'name' => [
                'max:100',
                'required',
                Rule::unique('promoters')->ignore($id)
            ],
            'slug' => [
                Rule::unique('promoters')->ignore($id)
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
