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
        'user_id',
        'name',
        'status',
    ];

    /**
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}
