<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ Contact, FeaturedPhoto };

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'developer_id',
        'name',
        'slug',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'featured_photo';

    /**
     * Get the promoter's contact.
     */
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    /**
     * Get the developer that owns the promoter.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get the promoter's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the investments for the promoter.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
