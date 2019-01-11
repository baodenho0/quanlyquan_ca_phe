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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
        Gate::define('admin',function($user){
            return $user->quyen === 'admin';
        });
        Gate::define('tieptan',function($user){
            return ($user->quyen === 'Nhân viên tiếp tân' || $user->quyen === 'admin');
        });
        Gate::define('phache',function($user){
            return ($user->quyen === 'Nhân viên pha chế' || $user->quyen === 'admin');
        });

    }
}
