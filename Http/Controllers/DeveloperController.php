<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Models\{ Address, Contact, FeaturedPhoto };
use Raffles\Modules\Linkre\Http\Requests\DeveloperRequest;
use Raffles\Modules\Linkre\Models\Developer;
use Raffles\Modules\Linkre\Repositories\DeveloperRepository;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class DeveloperController extends ApiResourceController
{
    use AuthorizesRequests;

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
        $developer = new Developer;
        $this->authorize('create', $developer);

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

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        $model->loadMissing('address', 'contact', 'featured_photo', 'map');

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
        return 'uploads/developers/';
    }

    /**
     * HasOne relation updateOrCreate logic.
     *
     * @param array    $fillable The relation fillable.
     * @param Model    $model    The eloquent model.
     * @param Relation $relation The eloquent relation.
     *
     * @return Model | null
     */
    protected function updateOrCreateHasOne(array $fillable, Model $model, Relation $relation)
    {
        $related = $relation->getRelated();

        if ($related instanceof Address) {
            $model->address()->updateOrCreate(['addressable_id' => $model->id, 'addressable_type' => 'investments'], $fillable);
	}

        if ($related instanceof Contact) {
            $model->contact()->updateOrCreate(['contactable_type' => 'Raffles\Modules\Linkre\Models\Developer', 'contactable_id' => $model->id], $fillable);
        }

        if ($related instanceof FeaturedPhoto) {
            $model->featured_photo()->updateOrCreate(['photoable_id' => $model->id, 'photoable_type' => 'investments'], $fillable);
        }
    }
}
