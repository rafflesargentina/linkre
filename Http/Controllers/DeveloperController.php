<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\DeveloperRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class DeveloperController extends ApiResourceController
{
    protected $repository = DeveloperRepository::class;

    protected $resourceName = 'developers';

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
        $model->load('investors');

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }
}
