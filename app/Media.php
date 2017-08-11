<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file', 'format', 'width', 'height',
    ];

    /**
     * Get the Meta for the Media.
     */
    public function meta()
    {
        return $this->hasMany('App\MediaMeta');
    }
}
