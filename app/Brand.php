<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    /**
     * Get the media record associated with this brand.
     */
    public function logo()
    {
        return $this->belongsTo('App\Media');
    }

    /**
     * The shops that belong to the brand.
     */
    public function shops()
    {
        return $this->belongsToMany('App\Shop');
    }
}
