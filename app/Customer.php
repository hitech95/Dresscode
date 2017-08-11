<?php

namespace App;

class Customer extends User
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * Get the addresses for the customer.
     *
     * @param boolean $billing
     * @return \App\Address
     */
    public function addresses($billing = false)
    {
        if($billing) {
            return $this->hasMany('App\Comment')->billing();
        } else {
            return $this->hasMany('App\Comment')->shipment();
        }
    }
}
