<?php

namespace App\Policies;

use App\Employee;
use App\User;
use App\Brand;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the brand.
     *
     * @param  \App\Employee $employee
     * @param  \App\Brand $brand
     * @return mixed
     */
    public function view(Employee $employee, Brand $brand)
    {
        //Employee with manage-products, manage-brands or manage-shop-products can see the brands
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->owner_shop
            || $permission->manage_brand || $permission->manage_produts
            || $permission->manage_shop_products;
    }

    /**
     * Determine whether the user can create brands.
     *
     * @param  \App\Employee $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        //Employee with manage-brands can create brands
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_brand;
    }

    /**
     * Determine whether the user can update the brand.
     *
     * @param  \App\Employee $employee
     * @param  \App\Brand $brand
     * @return mixed
     */
    public function update(Employee $employee, Brand $brand)
    {
        //Employee with manage-brands can update brands
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_brands;
    }

    /**
     * Determine whether the user can delete the brand.
     *
     * @param  \App\Employee $employee
     * @param  \App\Brand $brand
     * @return mixed
     */
    public function delete(Employee $employee, Brand $brand)
    {
        //Employee with manage-brands can delete brands
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_brands;
    }
}
