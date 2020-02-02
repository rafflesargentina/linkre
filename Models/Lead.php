<?php

namespace Raffles\Modules\Linkre\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'company',
        'country',
        'first_name',
        'last_name',
        'mobile',
        'phone',
        'position',
        'subscribe',
    ];
}
