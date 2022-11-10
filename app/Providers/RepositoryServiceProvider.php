<?php

namespace App\Providers;

use App\Ucase\Interfaces\ClientInterface;
use App\Ucase\Interfaces\HakimInterface;
use App\Ucase\Repositories\ClientRepo;
use App\Ucase\Repositories\HakimRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(HakimInterface::class, HakimRepo::class);
        $this->app->bind(ClientInterface::class, ClientRepo::class);
    }
}
