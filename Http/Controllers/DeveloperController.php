<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\DeveloperRequest;
use Raffles\Modules\Linkre\Repositories\DeveloperRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class DeveloperController extends ApiResourceController
{
    protected $formRequest = DeveloperRequest::class;

    protected $repository = DeveloperRepository::class;

    protected $resourceName = 'developers';

    /**
     * Create a new DeveloperController instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }

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

        $model->load('address', 'contact', 'featured_photo', 'map');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/developers/';
    }
}
