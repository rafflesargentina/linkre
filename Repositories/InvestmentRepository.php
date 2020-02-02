<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Investment;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Investment::class;

    /**
     * @var array
     */
    public $tag = ['Investment'];

    /**
     * Find all entities.
     *
     * @param array $columns
     * @param array $with
     */
    //public function findAll($columns = ['*'], $with = [])
    //{
        //$user = request()->user('api');

        //$cacheKey = $this->generateKey([$columns, $user, $with]);

        //return $this->cacheResults(get_called_class(), __FUNCTION__, $cacheKey, function () use ($columns, $user, $with) {
            //if (!$user || $user->isAdmin()) {
                //return $this->model->with($with)->get($columns);
            //}

            //if ($user->developer) {
                //return $this->findWhere(['developer_id' => $user->id], $columns, $with);
            //}

            //return [];
        //});
    //}
}
