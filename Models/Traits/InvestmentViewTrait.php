<?php

namespace Raffles\Modules\Linkre\Models\Traits;

use Carbon\Carbon;

trait InvestmentViewTrait
{
    /**
     * Get the investment view lifespan.
     *
     * @return string
     */
    public function getLifespanAttribute()
    {
        return $this->attributes['lifespan'] = $this->deleted_at ? $this->deleted_at->diffForHumans($this->created_at) : 0;
    }
}
