<?php

namespace App\Providers;

use App\Ucase\Interfaces\ClientInterface;
use App\Ucase\Interfaces\GugatanInterface;
use App\Ucase\Interfaces\HakimInterface;
use App\Ucase\Interfaces\JadwalSidangInterface;
use App\Ucase\Repositories\ClientRepo;
use App\Ucase\Repositories\GugatenRepo;
use App\Ucase\Repositories\HakimRepo;
use App\Ucase\Repositories\JadwalSidangRepo;
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
        $this->app->bind(JadwalSidangInterface::class, JadwalSidangRepo::class);
        $this->app->bind(GugatanInterface::class, GugatenRepo::class);
    }
}
