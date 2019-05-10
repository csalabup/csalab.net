<?php

namespace junecity\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'junecity\Model' => 'junecity\Policies\ModelPolicy',
        
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

       

        $gate->define('SuperAdminAccess', function ($user) {

            return $user->role == 'SuperAdmin';
                        
        });

        $gate->define('AdminAccess', function ($user) {

            return $user->role == 'Admin';
        });


        $gate->define('RegularAccess', function ($user) {

            return $user->role == 'Regular';
        });

            
     



    }
}
