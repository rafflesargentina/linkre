<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\InvestmentViewRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentViewController extends ApiResourceController
{
    protected $repository = InvestmentViewRepository::class;

    protected $resourceName = 'investment-views';

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
}
