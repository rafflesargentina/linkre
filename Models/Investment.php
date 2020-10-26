<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ Address, FeaturedPhoto, Map, UnfeaturedPhoto };

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

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
        'company_id',
        'context',
        'description',
        'featured',
        'name',
        'promoter_id',
        'published',
        'published_at',
        'resume',
        'slug',
        'total_area',
        'user_id',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'featured_photo';

    /**
     * Get the investment's address.
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->withDefault();
    }

    /**
     * Get the company that owns the investment.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get all of the investment's documents.
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Get the investment's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the financial record associated with the investment.
     */
    public function financial()
    {
        return $this->hasOne(Financial::class)->withDefault();
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
        return $this->morphOne(Map::class, 'mapable')->withDefault();
    }

    /**
     * Get the promoter that owns the investment.
     */
    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    /**
     * Get all of the investment's unfeatured photos.
     */
    public function unfeatured_photos()
    {
        return $this->morphMany(UnfeaturedPhoto::class, 'photoable');
    }

    /**
     * Get the user that owns the investment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
