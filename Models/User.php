<?php

namespace Raffles\Modules\Linkre\Models;

use Raffles\Models\User as BaseUser;

class User extends BaseUser
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
        'slug'
    ];
}
