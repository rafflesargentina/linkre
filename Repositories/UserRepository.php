<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\User;

use Caffeinated\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = User::class;

    /**
     * @var array
     */
    public $tag = ['User'];
}
