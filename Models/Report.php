<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ FeaturedPhoto, UnfeaturedPhotos };
use Raffles\Models\Traits\ArticleTrait;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    Use ArticleTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'extract',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'category_id',
        'download',
        'slug',
        'title',
        'user_id',
        'published',
        'published_at',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['documents', 'featured_photo'];

    /**
     * Get the report's documents.
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Get the article's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the article that owns the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
