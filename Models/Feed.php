<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feeds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'feedable_id',
        'feedable_type',
        'title',
        'user_id',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'user';

    /**
     * Get the user that owns the feed.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
