<?php

namespace Raffles\Modules\Linkre\Models\Traits;

trait InvestmentTrait
{
    /**
     * Get the project location.
     *
     * @return string
     */
    public function getLocationAttribute()
    {
        return $this->attributes['location'] = $this->city ? $this->city.', '.$this->state :  $this->state.', '.$this->country;
    }
}
