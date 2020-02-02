<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ FeaturedPhoto };
use Raffles\Models\User as Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'developer',
        'document_number',
        'document_type_id',
        'email',
        'first_name',
        'investment_type_id',
        'investment_value_id',
        'investor',
        'last_name',
        'password',
        'slug'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'featured_photo';

    /**
     * Get the developer profile record associated with the user.
     */
    public function developer_profile()
    {
        return $this->hasOne(DeveloperProfile::class);
    }

    /**
     * Get the promoter's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * The investments that belong to the user.
     */
    public function investments()
    {
        return $this->belongsToMany(Investment::class, 'investment_investor', 'investor_id');
    }

    /**
     * Get the investor profile record associated with the user.
     */
    public function investor_profile()
    {
        return $this->hasOne(InvestorProfile::class);
    }
}
