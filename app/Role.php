<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Rememberable\Rememberable;

class Role extends Model
{
    use Rememberable, SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'enabled',
        'owner_platform', 'owner_shop',
        'manage_shop', 'manage_shop_carts', 'manage_shop_employees', 'manage_shop_orders', 'manage_shop_products', 'manage_shop_tickets',
        'manage_brands', 'manage_carts', 'manage_employees', 'manage_orders', 'manage_products', 'manage_roles', 'manage_shops', 'manage_tickets'
    ];

    /**
     * Scope a query to only include active roles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('enabled', '=', true);
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
