<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaMeta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value', 'media_id'
    ];

    /**
     * Scope a query to only include title meta.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTitle($query)
    {
        return $query->where('key', '=', 'title');
    }

    /**
     * Scope a query to only include description meta.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDescription($query)
    {
        return $query->where('key', '=', 'description');
    }
}
