<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Address' => 'App\Policies\AddressPolicy',
        'App\Ticket' => 'App\Policies\TicketPolicy',
        'App\Shop' => 'App\Policies\ShopPolicy',
        'App\Brand' => 'App\Policies\BrandPolicy',
        'App\Role' => 'App\Policies\RolePolicy',
        'App\Customer' => 'App\Policies\CustomerPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
