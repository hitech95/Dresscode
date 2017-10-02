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
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_shops;
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
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_shops
            || ($shop->id == $employee->shop_id && ($permission->owner_shop || $permission->manage_shops));
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
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_shops
            || ($shop->id == $employee->shop_id && ($permission->owner_shop || $permission->manage_shops));
    }

    /**
     * Determine whether the user can create a shop.
     *
     * @param  \App\Employee $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_shop
            || ($employee->shop_id == null && $permission->owner_shop);
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
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_shops
            || ($shop->id == $employee->shop_id && $permission->owner_shop);
    }
}
