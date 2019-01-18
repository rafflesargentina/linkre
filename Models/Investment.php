<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'location',
        'name',
        'slug',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['featuredPhoto', 'financial', 'map', 'unfeaturedPhotos'];

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
    public function featuredPhoto()
    {
        return $this->morphOne(\Raffles\Models\FeaturedPhoto::class, 'photoable');
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
        return $this->morphOne(\Raffles\Models\Map::class, 'mapable');
    }

    /**
     * Get all of the project's unfeatured photos.
     */
    public function unfeaturedPhotos()
    {
        return $this->morphMany(\Raffles\Models\Photo::class, 'photoable')->where('featured', '0');
    }
}
