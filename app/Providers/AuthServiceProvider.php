<?php

namespace App\Providers;

use App\Models\User;
use Dusterio\LumenPassport\LumenPassport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Passport::tokensCan([
            'crud-list' => 'Can CRUD as Admin',
            'see-list' => 'Can See only as Staff',
        ]);

        Passport::setDefaultScope([
            'crud-list',
            'see-list',
        ]);

        LumenPassport::routes($this->app, ['prefix' => 'v1/oauth']);
    }
}
