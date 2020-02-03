<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\PromoterRequest;
use Raffles\Modules\Linkre\Models\Promoter;
use Raffles\Modules\Linkre\Repositories\PromoterRepository;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class PromoterController extends ApiResourceController
{
    use AuthorizesRequests;

    protected $formRequest = PromoterRequest::class;

    protected $repository = PromoterRepository::class;

    protected $resourceName = 'promoters';

    /**
     * Create a new PromoterController instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The request object.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $promoter = new Promoter;
        $this->authorize('create', $promoter);

        $user = $request->user('api');
        $request->request->add(['user_id' => $user->id]);

        return parent::store($request);
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
        $this->authorize('view', $model);

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        $model->loadMissing('contact', 'featured_photo');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $this->authorize('update', $model);

        return parent::update($request, $key);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $this->authorize('delete', $model);

        return parent::destroy($request, $key);
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
