<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\InvestmentRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentController extends ApiResourceController
{
    protected $repository = InvestmentRepository::class;

    protected $resourceName = 'investments';

    /**
     * Display the specified resource.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @return mixed
     */
    public function show(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $model->load('company', 'financial', 'unfeatured_photos');

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }
}
