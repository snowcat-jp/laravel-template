<?php

namespace App\Models;

use App\Models\Base\ModelBase;

class Contents extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
}
