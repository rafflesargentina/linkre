<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consulting',
        'expertise',
        'investment_type_id',
        'investment_value_id',
        'investor_type_id',
        'portfolio',
        'real_estate',
        'reit',
        'user_id',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['investment_preferences', 'investment_type', 'investment_value', 'investor_type'];

    /**
     * The investment preferences that belong to the investor profile.
     */
    public function investment_preferences()
    {
        return $this->belongsToMany(InvestmentPreference::class);
    }

    /**
     * Get the investment type that owns the investor profile.
     */
    public function investment_type()
    {
        return $this->belongsTo(InvestmentType::class);
    }

    /**
     * Get the investment value that owns the investor profile.
     */
    public function investment_value()
    {
        return $this->belongsTo(InvestmentValue::class);
    }

    /**
     * Get the investor that owns the investor profile.
     */
    public function investor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the investor type that owns the investor profile.
     */
    public function investor_type()
    {
        return $this->belongsTo(InvestorType::class);
    }
}
