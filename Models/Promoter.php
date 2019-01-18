<?php

namespace Raffles\Modules\Linkre\Models;

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
     * Get the developer that owns the promoter.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get the investments for the developer.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
