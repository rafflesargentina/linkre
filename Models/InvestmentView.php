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
        'user_id',
    ];

    /**
     * Get the investment that owns the investment view.
     */
    public function investment()
    {
        return $this->belongsTo(Investment::class, 'investment_id');
    }

    /**
     * Get the user that owns the investment view.
     */
    public function user()
    {
        return $this->belongsTo(Investor::class, 'user_id');
    }
}
