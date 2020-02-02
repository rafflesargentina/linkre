<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class DeveloperProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'career',
        'city',
        'company',
        'country',
        'expertise',
        'project_description',
        'project_name',
        'website',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'investment_preferences';

    /**
     * Get the developer that owns the developer profile.
     */
    public function developer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The investment preferences that belong to the investor profile.
     */
    public function investment_preferences()
    {
        return $this->belongsToMany(InvestmentPreference::class);
    }
}
