<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\ArticleRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class ArticleController extends ApiResourceController
{
    protected $repository = ArticleRepository::class;

    protected $resourceName = 'news';

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/news/';
    }
}
