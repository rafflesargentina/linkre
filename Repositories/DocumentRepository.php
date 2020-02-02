<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Document;

use Caffeinated\Repository\Repositories\EloquentRepository;

class DocumentRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Document::class;

    /**
     * @var array
     */
    public $tag = ['Document'];
}
