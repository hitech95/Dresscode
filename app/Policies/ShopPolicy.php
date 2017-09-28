<?php

namespace App\Policies;

use App\Customer;
use App\Address;
use App\Employee;
use App\Shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can list the shops.
     *
     * @param  \App\Employee $employee
     * @return mixed
     */
    public function lists(Employee $employee)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can list the shops.
     *
     * @param  \App\Employee $employee
     * @param  \App\Shop $shop
     * @return mixed
     */
    public function view(Employee $employee, Shop $shop)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can edit the shop.
     *
     * @param  \App\Employee $employee
     * @param  \App\Shop $shop
     * @return mixed
     */
    public function update(Employee $employee, Shop $shop)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can create a shop.
     *
     * @param  \App\Employee $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can delete the shop.
     *
     * @param  \App\Employee $employee
     * @param  \App\Shop $shop
     * @return mixed
     */
    public function delete(Employee $employee, Shop $shop)
    {
        return true; // TODO
    }
}
