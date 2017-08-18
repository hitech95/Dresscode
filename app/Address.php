<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'zip', 'city', 'district',
        'company', 'name', 'surname', 'phone',
        'invoice'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('billing');

    /**
     * Get the customer record associated with this address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Scope a query to only include billing addresses.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBilling($query)
    {
        return $query->where('invoice', true);
    }

    /**
     * Scope a query to only include billing addresses.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShipment($query)
    {
        return $query->where('invoice', false);
    }

    /**
     * Get if the address is for billing.
     *
     * @param  string $value
     * @return boolean
     */
    public function getBillingAttribute($value)
    {
        return $this->invoice;
    }

    /**
     * Set the address's as invoice.
     *
     * @param  boolean $value
     * @return void
     */
    public function setBillingAttribute($value)
    {
        $this->attributes['invoice'] = $value;
    }
}
