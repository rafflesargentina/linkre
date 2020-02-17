<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Feed;

use Caffeinated\Repository\Repositories\EloquentRepository;

class FeedRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Feed::class;

    /**
     * @var array
     */
    public $tag = ['Feed'];
}
