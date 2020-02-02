<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\ReportRepository;

use Illuminate\Validation\Rule;
use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class ReportRequest extends ActionBasedFormRequest
{
    /**
     * Get the validation rules that apply to the request for the store action.
     *
     * @return array
     */
    public static function store()
    {
        if (request()->documents) {
            return [
                'documents[]' => 'file|mimes:pdf',
            ];
        }

        if (request()->featured_photo) {
            return [
                'featured_photo[]' => 'image',
            ];
        }

        $repository = new ReportRepository();
        $model = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular('reports')
            )
        );

        $id = $model ? $model->id : null;

        return [
            'title' => 'required',
            'slug' => [
                Rule::unique('reports')->ignore($id)
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
