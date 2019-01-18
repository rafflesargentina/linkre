<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\User;
use Raffles\Models\Traits\UserTrait;

class Investor extends User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_number',
        'document_type_id',
        'email',
        'first_name',
        'last_name',
        'password',
        'slug',
        'user_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'investors';

    /**
     * The investments that belong to the investor.
     */
    public function investments()
    {
        return $this->belongsToMany(Investment::class);
    }

    /**
     * Get the developer that owns the investor.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
