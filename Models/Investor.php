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
        'developer_id',
        'document_number',
        'document_type_id',
        'email',
        'first_name',
        'investor',
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
                $model->investor = 1;
            }
        );
    }

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

    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return parent::newQuery()->whereInvestor('1');
    }
}
