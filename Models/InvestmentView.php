<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Modules\Linkre\Models\Traits\InvestmentViewTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentView extends Model
{
    use InvestmentViewTrait, SoftDeletes;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'lifespan',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'investment_id',
    ];

    /**
     * Get the user that owns the investment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the investment that owns the investment.
     */
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
