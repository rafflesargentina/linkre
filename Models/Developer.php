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
        'developer',
        'document_number',
        'document_type_id',
        'email',
        'first_name',
        'last_name',
        'password',
        'slug',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = 'investments';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {
                $model->developer = 1;
            }
        );
    }

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

    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return parent::newQuery()->whereDeveloper('1');
    }
}
