<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestmentRequest;
use Raffles\Modules\Linkre\Models\Investment;
use Raffles\Modules\Linkre\Repositories\InvestmentRepository;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentController extends ApiResourceController
{
    use AuthorizesRequests;

    protected $formRequest = InvestmentRequest::class;

    protected $repository = InvestmentRepository::class;

    protected $resourceName = 'investments';

    /**
     * Create a new InvestmentController instance.
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
        $investment = new Investment;
        $this->authorize('create', $investment);

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

        $model->loadMissing('address', 'company', 'documents', 'financial', 'map', 'unfeatured_photos');

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
     * Get items collection.
     *
     * @param string $orderBy The order key.
     * @param string $order   The order direction.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItemsCollection($orderBy = 'updated_at', $order = 'desc')
    {
        return $this->repository->findAll();
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/projects/';
    }
}
