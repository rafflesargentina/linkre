<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Modules\Linkre\Models\Traits\InvestmentTrait;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use InvestmentTrait;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'location',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amenities',
        'city',
        'company_id',
        'country',
        'context',
        'description',
        'developer_id',
        'featured',
        'name',
        'promoter_id',
        'published',
        'published_at',
        'resume',
        'slug',
        'state',
        'total_area',
        'website',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'featured_photo';

    /**
     * Get the company that owns the investment.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the developer that owns the investment.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get the investment's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(\Raffles\Models\FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the financial record associated with the investment.
     */
    public function financial()
    {
        return $this->hasOne(Financial::class);
    }

    /**
     * Get the views for the investment.
     */
    public function investmentViews()
    {
        return $this->hasMany(InvestmentView::class);
    }

    /**
     * The investor that belong to the investment.
     */
    public function investors()
    {
        return $this->belongsToMany(Investor::class);
    }

    /**
     * Get the map record associated with the investment.
     */
    public function map()
    {
        return $this->morphOne(\Raffles\Models\Map::class, 'mapable')->withDefault();
    }

    /**
     * Get the promoter that owns the investment.
     */
    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    /**
     * Get all of the project's unfeatured photos.
     */
    public function unfeatured_photos()
    {
        return $this->morphMany(\Raffles\Models\UnfeaturedPhoto::class, 'photoable');
    }
}
