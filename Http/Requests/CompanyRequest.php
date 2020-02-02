<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\CompanyRepository;

use Illuminate\Validation\Rule;
use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class CompanyRequest extends ActionBasedFormRequest
{
    /**
     * Get the validation rules that apply to the request for the store action.
     *
     * @return array
     */
    public static function store()
    {
        if (request()->featured_photo) {
            return [
                'featured_photo[]' => 'image',
            ];
        }

        $repository = new CompanyRepository();
        $model = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular('companies')
            )
        );

        $id = $model ? $model->id : null;

        return [
            'description' => 'required',
            'name' => [
                'max:100',
                'required',
                Rule::unique('companies')->ignore($id)
            ],
            'slug' => [
                Rule::unique('companies')->ignore($id)
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
