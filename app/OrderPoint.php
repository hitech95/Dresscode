<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderPoint extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'points',
    ];
}
