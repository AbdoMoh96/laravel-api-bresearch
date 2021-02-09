<?php

namespace App\Providers\Admin\Api;



use App\Repositories\Admin\Api\ClientEmailRepository;
use App\Repositories\Admin\Api\ClientRepository;
use App\Repositories\Admin\Api\ClientTypesRepository;
use App\Repositories\Admin\Api\GroupsRepository;
use App\Repositories\Admin\Api\InstitutionsRepository;
use App\Repositories\Admin\Interfaces\Api\ClientEmailRepositoryInterface;
use App\Repositories\Admin\Interfaces\Api\ClientsRepositoryInterface;
use App\Repositories\Admin\Interfaces\Api\ClientTypesRepositoryInterface;
use App\Repositories\Admin\Interfaces\Api\GroupRepositoryInterface;
use App\Repositories\Admin\Interfaces\Api\InstitutionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AdminProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ClientsRepositoryInterface::class , ClientRepository::class);
        $this->app->bind(ClientEmailRepositoryInterface::class , ClientEmailRepository::class);
        $this->app->bind(GroupRepositoryInterface::class , GroupsRepository::class);
        $this->app->bind(InstitutionRepositoryInterface::class , InstitutionsRepository::class);
        $this->app->bind(ClientTypesRepositoryInterface::class , ClientTypesRepository::class);
    }
}
