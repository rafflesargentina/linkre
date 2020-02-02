<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\Company as Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'video',
        'slug',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['contact', 'featured_photo'];

    /**
     * Get the investments for the company.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
