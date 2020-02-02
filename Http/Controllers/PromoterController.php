<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\PromoterRequest;
use Raffles\Modules\Linkre\Repositories\PromoterRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class PromoterController extends ApiResourceController
{
    protected $formRequest = PromoterRequest::class;

    protected $repository = PromoterRepository::class;

    protected $resourceName = 'promoters';

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

        $model->loadMissing('contact', 'featured_photo');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/promoters/';
    }
}
