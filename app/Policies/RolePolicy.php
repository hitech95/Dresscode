<?php

namespace App\Policies;

use App\Employee;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Employee $employee, Role $role)
    {
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->owner_shop
            || $permission->manage_roles || $permission->manage_employees
            || $permission->manage_shop_employees;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function create(Employee $employee)
    {
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_roles;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Employee $employee, Role $role)
    {
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_roles;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Employee  $employee
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Employee $employee, Role $role)
    {
        //Employee with manage-employee or manage-shop-employee can see the roles
        $permission = $employee->roles()->rememberForever()->active()->first();
        return $permission->owner_platform || $permission->manage_roles;
    }
}
