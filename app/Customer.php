<?php

namespace App;

use Propaganistas\LaravelPhone\PhoneNumber;

class Customer extends User
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'phone',
    ];

    /**
     * Get the addresses for the customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    /**
     * Get the customer's phone number.
     *
     * @param  string $value
     * @return Propaganistas\LaravelPhone\PhoneNumber
     */
    public function getPhoneAttribute($value)
    {
        return PhoneNumber::make($value, 'IT');
    }

    /**
     * Set the customer's phone number.
     *
     * @param  Propaganistas\LaravelPhone\PhoneNumber $value
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = ($value == null) ? $value : $value->formatE164();
    }
}
