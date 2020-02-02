<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentType extends Model
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
     * Get the investors for the investment type.
     */
    public function investors()
    {
        return $this->hasMany(User::class);
    }
}
