<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'latitude', 'longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'latitude', 'latitude',
    ];

    /**
     * The brands that belong to the shop.
     *
     * @return \App\Brand
     */
    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }

    /**
     * The media that belong to the shop.
     *
     * @return \App\Media
     */
    public function roles()
    {
        return $this->belongsToMany('App\Media');
    }
}
