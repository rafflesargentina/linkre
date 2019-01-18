<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'adquisition_cost' => 'int',
        'apr' => 'int',
        'development_cost' => 'int',
        'equity' => 'int',
        'funded' => 'int',
        'irr' => 'int',
        'mezzanine_debt' => 'int',
        'remaning' => 'int',
        'senior_debt' => 'int',
        'open_offer' => 'int'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adquisition_cost',
        'apr',
        'bank',
        'crowdfunding',
        'development_cost',
        'ehp',
        'equity',
        'investment_id',
        'irr',
        'mezzanine_debt',
        'open_offer',
        'senior_debt'
    ];

    /**
     * Get the investment that owns the financial.
     */
    public function investment()
    {
        return $this->belongsTo(Investment::class, 'investment_id');
    }
}