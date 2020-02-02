<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Models\Article;

use Caffeinated\Repository\Repositories\EloquentRepository;

class ArticleRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Article::class;

    /**
     * @var array
     */
    public $tag = ['Article'];
}
