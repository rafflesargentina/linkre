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
        'companyable_id',
        'companyable_type',
        'description',
        'name',
        'video',
        'slug',
        'user_id',
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
