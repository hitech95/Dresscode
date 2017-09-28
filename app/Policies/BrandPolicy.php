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
     * @param  \App\Employee  $employee
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function view(Employee $employee, Brand $brand)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can create brands.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can update the brand.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function update(Employee $employee, Brand $brand)
    {
        return true; // TODO
    }

    /**
     * Determine whether the user can delete the brand.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function delete(Employee $employee, Brand $brand)
    {
        return true; // TODO
    }
}
