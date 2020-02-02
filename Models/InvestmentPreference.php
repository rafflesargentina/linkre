<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentPreference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'slug',
    ];

    /**
     * The developer profiles that belong to the investment preference.
     */
    public function developer_profiles()
    {
        return $this->belongsToMany(DeveloperProfile::class);
    }

    /**
     * The investor profiles that belong to the investment preference.
     */
    public function investor_profiles()
    {
        return $this->belongsToMany(InvestmentorProfile::class);
    }
}
