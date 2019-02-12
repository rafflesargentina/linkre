<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\InvestmentRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentController extends ApiResourceController
{
    protected $pruneHasOne = true;

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

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        $model->load('company', 'financial', 'map', 'unfeatured_photos');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/investments/';
    }
}
