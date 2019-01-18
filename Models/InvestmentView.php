<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentView extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'investor_id',
    ];

    /**
     * Get the investment that owns the investment view.
     */
    public function investment()
    {
        return $this->belongsTo(Investment::class, 'investment_id');
    }

    /**
     * Get the investor that owns the investment view.
     */
    public function investor()
    {
        return $this->belongsTo(Investor::class, 'investor_id');
    }
}
