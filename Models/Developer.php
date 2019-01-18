<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\User;
use Raffles\Models\Traits\UserTrait;

class Developer extends User
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
    protected $table = 'developers';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'investments';

    /**
     * Get the investments for the developer.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    /**
     * Get the investors for the developer.
     */
    public function investors()
    {
        return $this->hasMany(Investor::class);
    }
}
