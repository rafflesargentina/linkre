<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestorRequest;
use Raffles\Modules\Linkre\Repositories\InvestorRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestorController extends ApiResourceController
{
    protected $formRequest = InvestorRequest::class;

    protected $repository = InvestorRepository::class;

    protected $resourceName = 'investors';

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

        $model->load('investments');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/investors/';
    }
}
