<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Propaganistas\LaravelPhone\PhoneNumber;

class Shop extends Model
{
    use SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'latitude', 'longitude', 'address', 'phone', 'fax', 'vat',
    ];

    /**
     * The brands that belong to the shop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }

    /**
     * The media that belong to the shop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Media');
    }

    /**
     * Get the shop's phone number.
     *
     * @param  string $value
     * @return Propaganistas\LaravelPhone\PhoneNumber
     */
    public function getPhoneAttribute($value)
    {
        if (isset($value)) {
            return PhoneNumber::make($value, 'IT');
        }
        return null;
    }

    /**
     * Set the shop's phone number.
     *
     * @param  \Propaganistas\LaravelPhone\PhoneNumber $value
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['phone'] = $value->formatE164();
        }
    }

    /**
     * Get the shop's fax number.
     *
     * @param  string $value
     * @return \Propaganistas\LaravelPhone\PhoneNumber
     */
    public function getFaxAttribute($value)
    {
        if (isset($value)) {
            return PhoneNumber::make($value, 'IT');
        }
        return null;
    }

    /**
     * Set the shop's fax number.
     *
     * @param  \Propaganistas\LaravelPhone\PhoneNumber $value
     * @return void
     */
    public function setFaxAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['fax'] = $value->formatE164();
        }
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
