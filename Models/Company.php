<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
     * Get the developer that owns the company.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get the investments for the company.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
