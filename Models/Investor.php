<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ Address, Contact, FeaturedPhoto, Map, User };
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
     * Get the investor's address.
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the investor's contact.
     */
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    /**
     * Get the developer that owns the investor.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get the investor's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * The investments that belong to the investor.
     */
    public function investments()
    {
        return $this->belongsToMany(Investment::class);
    }

    /**
     * Get the investor's map.
     */
    public function map()
    {
        return $this->morphOne(Map::class, 'mapable');
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

    /**
     * Developers can have many permissions.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function permissions()
    {
        return $this->belongsToMany(\Caffeinated\Shinobi\Models\Permission::class, 'permission_user', 'permission_id', 'user_id')->withTimestamps();
    }

    /**
     * Developers can have many roles.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function roles()
    {
        return $this->belongsToMany(\Caffeinated\Shinobi\Models\Role::class, 'role_user', 'role_id', 'user_id')->withTimestamps();
    }
}
