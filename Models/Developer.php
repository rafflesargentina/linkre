<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\{ Address, Contact, FeaturedPhoto, Map, User };

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
    protected $with = 'featured_photo';

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
     * Get the investor's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
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
        return parent::newQuery()->whereDeveloper('1');
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
