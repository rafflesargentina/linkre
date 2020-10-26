<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Raffles\Modules\Linkre\Repositories\InvestmentRepository;

use Illuminate\Validation\Rule;
use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class InvestmentRequest extends ActionBasedFormRequest
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
                'documents[]' => 'file',
            ];
        }

        if (request()->featured_photo) {
            return [
                'featured_photo[]' => 'image',
            ];
        }

        if (request()->unfeatured_photos) {
            return [
                'unfeatured_photos[]' => 'image',
            ];
        }

        $repository = new InvestmentRepository();
        $model = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular('investments')
            )
        );

        $id = $model ? $model->id : null;

	return [
            'address.locality' => 'required',
	    'address.country' => 'required',
            'company_id' => 'required',
            'description' => 'required',
            'financial.adquisition_cost' => 'numeric',
            'financial.apr' => 'numeric',
            'financial.bank' => 'nullable',
            'financial.crowdfunding' => 'nullable',
            'financial.development_cost' => 'numeric',
            'financial.ehp' => 'numeric',
            'financial.equity' => 'numeric',
            'financial.irr' => 'numeric',
            'financial.funded' => 'numeric',
            'financial.mezzanine_debt' => 'numeric',
            'financial.open_offer' => 'numeric',
            'financial.senior_debt' => 'numeric',
            'name' => [
                'max:100',
                'required',
                Rule::unique('investments')->ignore($id)
            ],
            'slug' => [
                Rule::unique('investments')->ignore($id)
            ]
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
