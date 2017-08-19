<?php

namespace App\Policies;

use App\Customer;
use App\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can edit the address.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Address  $address
     * @return mixed
     */
    public function edit(Customer $customer, Address $address)
    {
        return $customer->id == $address->customer_id;
    }

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \App\Customer  $customer
     * @return mixed
     */
    public function create(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Address  $address
     * @return mixed
     */
    public function update(Customer $customer, Address $address)
    {
        return $customer->id == $address->customer_id;
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Address  $address
     * @return mixed
     */
    public function delete(Customer $customer, Address $address)
    {
        return count($customer->addresses()) > 0 &&
            $customer->id == $address->customer_id;
    }
}
